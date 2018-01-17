<?php
#
# z in FizzBuzzString
# https://yukicoder.me/problems/no/311
#

$stdin = trim(fgets(STDIN)); // 標準入力

$fizz_buzz_str = new FizzBuzzString($stdin);
echo $fizz_buzz_str->count_z() . "\n";

// ついでに文字列も表示する
echo $fizz_buzz_str->get_string() . "\n";


class FizzBuzzString
{
	const FIZZ = 'Fizz';
	const BUZZ = 'Buzz';
	const FIZZ_BUZZ = 'FizzBuzz';

	private $z_count = 0;
	private $fizz_buzz_str = '';

	public function __construct($num)
	{
		for ($i=1; $i <= $num; $i++)
		{
			$str = (string)$i;
			
			if ($i % 3 == 0 && $i % 5 == 0)
			{
				$str = self::FIZZ_BUZZ;
			}
			else if ($i % 3 == 0)
			{
				$str = self::FIZZ;
			}
			else if ($i % 5 == 0)
			{
				$str = self::BUZZ;
			}

			$count = mb_substr_count($str, 'z');
			$this->z_count += $count;

			$this->fizz_buzz_str .= $str;
		}
	}

	public function count_z()
	{
		return $this->z_count;
	}

	public function get_string()
	{
		return $this->fizz_buzz_str;
	}
}