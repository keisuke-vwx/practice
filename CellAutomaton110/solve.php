<?php
#
# No.663 セルオートマトンの逆操作
# https://yukicoder.me/problems/no/663
#
require_once('CellAutomaton110.php');
require_once('../util/TwoOperations/BitSeqList.php');


$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		$target_list = get_target_list($stdins);
		$length = (int)$stdins[0];
		solve($length, $target_list);
		return;
	}
	$stdins[] = $stdin;
}


function solve($length, $target_list)
{
	$bit_seq_list = new BitSeqList($length);
	$bit_list = $bit_seq_list->get_list();

	$count = 0;

	foreach ($bit_list as $_idx => $_bit_seq)
	{
		$_bit_seq_str = implode($_bit_seq);
		$automaton = new CellAutomaton110($_bit_seq_str);
		$next_list = $automaton->gen_next_list();
		// echo $next_list . "\n";

		if ($next_list == $target_list)
			$count++;
	}

	echo $count . "\n";
}


function get_target_list($input)
{
	$target_list = array();
	foreach ($input as $_idx => $_val)
	{
		if ($_idx)
			$target_list[] = $_val;
	}

	return implode($target_list);
}
