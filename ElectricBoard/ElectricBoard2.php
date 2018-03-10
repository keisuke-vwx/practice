<?php
#
# Addition and Multiplication
# https://abc076.contest.atcoder.jp/tasks/abc076_b
#
require_once('../util/TwoOperations/TwoOperations.php');


class ElectricBoard2 extends TwoOperations
{

	private $_number = 1;
	private $_additional = 1;
	private $_results = array();


	public function __construct($operation_times, $additional)
	{
		parent::__construct($operation_times);

		$this->_additional = $additional;
	}


	public function get_number()
	{
		return $this->_number;
	}


	public function simulate()
	{
		$this->exec();
		echo min($this->_results) . "\n";
	}


	protected function on_bit_func()
	{
		$this->_add();
	}


	protected function off_bit_func()
	{
		$this->_twice();
	}


	protected function init_operation()
	{
		$this->_init_number();
	}


	protected function operation_done()
	{
		$this->_results[] = $this->_number;
	}


	private function _init_number()
	{
		$this->_number = 1;
	}


	private function _add()
	{
		$this->_number += $this->_additional;
	}


	private function _twice()
	{
		$this->_number *= 2;
	}

}


$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		$operation_times = $stdins[0];
		$additional = $stdins[1];

		$board = new ElectricBoard2($operation_times, $additional);
		$board->simulate();
		return;
	}
	$stdins[] = $stdin;
}
