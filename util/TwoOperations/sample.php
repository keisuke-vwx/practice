<?php
require_once('TwoOperations.php');


class PlusOrTwice extends TwoOperations
{

	private $_initial_num = 3;
	private $_num;
	private $_output = "";


	public function __construct($times)
	{
		parent::__construct($times);
	}


	protected function on_bit_func()
	{
		$this->_num *= 2;
		$this->_output = sprintf("%s -> %s", $this->_output, $this->_num);
	}


	protected function off_bit_func()
	{
		$this->_num += 1;
		$this->_output = sprintf("%s -> %s", $this->_output, $this->_num);
	}


	protected function init_operation()
	{
		$this->_num = $this->_initial_num;
		$this->_output = sprintf("%s", $this->_num);
	}


	protected function operation_done()
	{
		echo $this->_output . "\n";
	}


}


$plusTwice = new PlusOrTwice(3);

$plusTwice->exec();

