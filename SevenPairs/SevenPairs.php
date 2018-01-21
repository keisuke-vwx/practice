<?php
#
# Seven Pairs
# https://yukicoder.me/problems/no/587
#

$stdin = trim(fgets(STDIN)); // 標準入力

$seven_pairs = new SevenPairs($stdin);
$seven_pairs->show_result();

class SevenPairs
{

	private $result;


	public function __construct($input)
	{
		$string_stat = array();
		$string_array = str_split($input);
		foreach ($string_array as $_str)
		{
			if (!isset($string_stat[$_str]))
			{
				$string_stat[$_str] = 1;
			}
			else
			{
				$string_stat[$_str] += 1;
			}
		}

		$single_str_count = 0;
		foreach ($string_stat as $_str => $_count)
		{
			if ($_count >= 3)
			{
				$this->impossible();
				break;
			}
			else if ($_count == 1)
			{
				$single_str_count += 1;
				$this->result = $_str;
			}

			if ($single_str_count > 1)
			{
				$this->impossible();
				break;
			}
		}

	}


	public function show_result()
	{
		echo $this->result . "\n";
	}


	private function impossible()
	{
		$this->result = "Impossible";
	}

}