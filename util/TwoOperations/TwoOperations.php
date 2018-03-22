<?php
require_once('BitSeqList.php');


abstract class TwoOperations
{
	private $_operaton_bit_list;


	public function __construct($operation_times)
	{
		$bit_seq_list = new BitSeqList($operation_times);
		$this->_operaton_bit_list = $bit_seq_list->get_list();
	}


	abstract protected function on_bit_func();


	abstract protected function off_bit_func();


	abstract protected function init_operation();


	abstract protected function operation_done();


	public function exec()
	{
		foreach ($this->_operaton_bit_list as $_operation_bit)
		{
			$this->init_operation();

			foreach ($_operation_bit as $_bit)
			{
				if ($_bit == "1")
				{
					$this->on_bit_func();
				}
				else
				{
					$this->off_bit_func();
				}
			}

			$this->operation_done();
		}
	}

}
