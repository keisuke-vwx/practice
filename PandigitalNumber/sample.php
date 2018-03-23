<?php
require_once('PandigitalNumber.php');


if (!isset($argv[1]))
{
	echo "missing 1 arg.\n";
	exit;
}


$length = $argv[1];
$pn = new PandigitalNumber($length);
$pn->set_echo_mode(TRUE);
$pn_list = $pn->generate();
