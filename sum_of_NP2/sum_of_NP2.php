<?php
#
# No.638 Sum of "not power of 2"
# https://yukicoder.me/problems/no/638
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

$sum_pattern = get_sum_pattern($argv[1]);
echo is_array($sum_pattern)
	? sprintf("%s %s\n", $sum_pattern[0], $sum_pattern[1])
	: $sum_pattern . "\n";


function get_sum_pattern($number)
{
	$half = ceil($number/2);

	for ($i=1; $i <= $half; $i++)
	{ 
		$a = $i;
		$b = $number - $i;
		if (is_pow_of_2($a) || is_pow_of_2($b))
		{
			continue;
		}

		return array($a, $b);
	}

	return -1;
}


function is_pow_of_2($number)
{
	if ($number == 1)
	{
		return TRUE;
	}
	
	return is_int($number) ? is_pow_of_2($number/2) : FALSE;
}
