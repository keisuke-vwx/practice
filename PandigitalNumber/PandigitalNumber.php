<?php


class PandigitalNumber
{
	private $length;
	private $seq = array();
	private $seq_list = array();

	private $is_echo_mode = FALSE;


	public function __construct($length = 10)
	{
		$this->length = $length;
	}


	private function _generate($n = 0)
	{
		if ($n >= $this->length && !empty($this->seq))
		{
			ksort($this->seq);
			if ($this->is_echo_mode)
			{
				echo implode($this->seq) . "\n";
			}
			else
			{
				$this->seq_list[] = $this->seq;
			}

			return;
		}

		for ($i=0; $i < $this->length; $i++)
		{
			if (!isset($this->seq[$i]))
			{
				$this->seq[$i] = $n;
				$this->_generate($n+1);
				unset($this->seq[$i]);
			}
		}
	}


	public function generate()
	{
		$this->_generate();
		return $this->seq_list;
	}


	public function set_echo_mode($mode)
	{
		$this->is_echo_mode = is_bool($mode) ? $mode : FALSE;
	}
}
