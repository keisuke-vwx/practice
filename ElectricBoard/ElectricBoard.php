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
	private $additional = 0;
	private $operation_times = 0;


	public function __construct($operation_times, $additional)
	{
		$this->_set_additional($additional);
		$this->_set_operation_times($operation_times);
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


	private function _set_additional($additional) 
	{
		$this->additional = $additional;
	}


	private function _set_operation_times($operation_times) 
	{
		$this->operation_times = $operation_times;
	}


	private function _get_operation_bit($index)
	{
		$bit_str = str_pad(decbin($index), $this->operation_times, '0', STR_PAD_LEFT);
		$operation_bit_array = str_split($bit_str);

		return $operation_bit_array;
	}


	public function exec($operation_bit)
	{
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
		$max = $this->operation_times;

		for ($i=0; $i < $max; $i++)
		{ 
			$operation_bit = $this->_get_operation_bit($i);
			$this->exec($operation_bit);
			echo $this->number . "\n";
		}
	}
}