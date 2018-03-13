<?php
#
# No.509 塗りつぶしツール
# https://yukicoder.me/problems/no/509
#

if (!isset($argv[1]))
{
	echo "missing 1 arg.\n";
	exit;
}
else if (!is_int((int)$argv[1]) || $argv[1] < 1)
{
	echo sprintf("invalid arg :%s. input integer.\n", $argv[1]);
	exit;
}


$number = $argv[1];

$npt = new NumPainter($number);
echo $npt->get_min_paint_count() . "\n";


class NumPainter
{

	const TORUS_0 = array(1,2,3,5,7);
	const TORUS_1 = array(0,4,6,9);
	const TORUS_2 = array(8);

	private $number = 0;
	private $number_array = array();
	private $paint_count = 0;

	private $torus_count_0 = 0;
	private $torus_count_1 = 0;
	private $torus_count_2 = 0;


	public function __construct($number)
	{
		$this->number = $number;
		$this->number_array = str_split("$number");
	}


	private function _count_torus_count($number_array)
	{
		foreach ($number_array as $_num)
		{
			if (in_array($_num, self::TORUS_0))
			{
				$this->torus_count_0++;
			}
			else if (in_array($_num, self::TORUS_1))
			{
				$this->torus_count_1++;
			}
			else if (in_array($_num, self::TORUS_2))
			{
				$this->torus_count_2++;
			}
		}
	}


	public function get_min_paint_count()
	{
		$this->_count_torus_count($this->number_array);

		return count($this->number_array) * 2 + 1 + $this->torus_count_1 + $this->torus_count_2 * 2;
	}

}

