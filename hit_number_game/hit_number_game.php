<?php
#
# 数当てゲーム
# https://yukicoder.me/problems/no/24
# 

$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		echo hit_number($stdins) . "\n";
		return;
	}
	$stdins[] = $stdin;
}


function hit_number($input)
{
	$candidate = array(0,1,2,3,4,5,6,7,8,9);

	$length = count($input);
	for ($i = 1; $i < $length; $i++)
	{
		$line = explode(' ', $input[$i]);
		$suggestion = array_slice($line, 0, 4);
		// array_chunk() とどちらが良い？
		$answer = $line[4];

		if ($answer == 'YES')
		{
			if (count($candidate) > count($suggestion))
			{
				$candidate = $suggestion;
			}
			else
			{
				$candidate = array_intersect($candidate, $suggestion);
			}
		}
		else if ($answer == 'NO')
		{
			$candidate = array_diff($candidate, $suggestion);
		}
		
		$candidate = array_values($candidate);

		if (count($candidate) == 1)
		{
			return $candidate[0];
		}
	}

	return "[ERROR] I have no idea.";
}