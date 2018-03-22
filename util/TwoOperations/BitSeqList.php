<?php


class BitSeqList
{
	private $_bit_sequence_list;


	public function __construct($length)
	{
		$this->_bit_sequence_list = $this->_get_bit_sequence_list($length);
	}


	public function get_list()
	{
		return $this->_bit_sequence_list;
	}


	private function _get_bit_sequence_list($length)
	{
		$bit_sequence_list = array();
		$max = pow(2, $length);
		for ($i=0; $i < $max; $i++)
		{ 
			$_bit_sequence = $this->_get_bit_sequence($i, $length);
			$operaton_bit_list[] = $_bit_sequence;
		}

		return $bit_sequence_list;
	}


	private function _get_bit_sequence($index, $length)
	{
		$bit_seq = str_pad(decbin($index), $length, '0', STR_PAD_LEFT);
		$bit_seq_array = str_split($bit_seq);

		return $bit_seq_array;
	}

}
