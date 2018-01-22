<?php
#
# Addition and Multiplication
# https://abc076.contest.atcoder.jp/tasks/abc076_b
#

$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		$operation_times = $stdins[0];
		$additional = $stdins[1];

		$board = new ElectricBoard($operation_times, $additional);
		$board->simulate();
		return;
	}
	$stdins[] = $stdin;
}


class ElectricBoard
{

	private $number = 1;
	private $additional = 1;
	private $operation_times = 0;


	public function __construct($operation_times, $additional)
	{
		$this->additional = $additional;
		$this->operation_times = $operation_times;
	}


	public function twice()
	{
		$this->number *= 2;
	}


	public function add()
	{
		$this->number += $this->additional;
	}


	public function get_number()
	{
		return $this->number;
	}


	private function _init_number()
	{
		$this->number = 1;
	}


	private function _get_operation_bit($index)
	{
		$bit_str = str_pad(decbin($index), $this->operation_times, '0', STR_PAD_LEFT);
		$operation_bit_array = str_split($bit_str);

		return $operation_bit_array;
	}


	public function exec($operation_bit)
	{
		$this->_init_number(); 
		foreach ($operation_bit as $_bit)
		{
			if ($_bit == 0)
			{
				$this->twice();
			}
			else if ($_bit == 1)
			{
				$this->add();
			}
		}
	}


	public function simulate()
	{
		$simulate_result = array();

		$max = pow(2, $this->operation_times);
		for ($i=0; $i < $max; $i++)
		{ 
			$operation_bit = $this->_get_operation_bit($i);
			$this->exec($operation_bit);
			$simulate_result[] += $this->number;
		}
		echo min($simulate_result) . "\n";
	}
}