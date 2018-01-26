<?php
#
# Summation of primes
# https://projecteuler.net/problem=10
#

$stdin = trim(fgets(STDIN));

$primes = get_all_primes_below($stdin);
echo array_sum($primes) . "\n";

function get_all_primes_below($num)
{
	$primes = array(2);

	for ($i=3; $i <= $num; $i++)
	{
		$is_prime = TRUE;
		$root = (int)sqrt($i);
		foreach ($primes as $p)
		{
			if ($p > $root)
			{
				break;
			}

			if ($i % $p == 0)
			{
				$is_prime = FALSE;
				break;
			}
		}

		if ($is_prime)
		{
			$primes[] += $i;
		}
	}

	return $primes;
}
