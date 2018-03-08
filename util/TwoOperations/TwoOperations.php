<?php


abstract class TwoOperations
{

	private $_operaton_bit_list;


	public function __construct($operation_times)
	{
		$this->_operaton_bit_list = $this->_get_operaton_bit_list($operation_times);
	}


	abstract protected function on_bit_func();


	abstract protected function off_bit_func();


	abstract protected function init_operation();


	abstract protected function operation_done();


	private function _get_operaton_bit_list($operation_times)
	{
		$operaton_bit_list = array();
		$max = pow(2, $operation_times);
		for ($i=0; $i < $max; $i++)
		{ 
			$_operation_bit = $this->_get_operation_bit($i, $operation_times);
			$operaton_bit_list[] = $_operation_bit;
		}

		return $operaton_bit_list;
	}


	private function _get_operation_bit($index, $operation_times)
	{
		$bit_str = str_pad(decbin($index), $operation_times, '0', STR_PAD_LEFT);
		$operation_bit_array = str_split($bit_str);

		return $operation_bit_array;
	}


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


