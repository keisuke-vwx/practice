<?php
#
# No.652 E869120 and TimeZone
# https://yukicoder.me/problems/no/652
#

$stdin = trim(fgets(STDIN)); // 標準入力

$inputs = explode(" ", $stdin);

if (count($inputs) != 3)
{
	printf("Inputs error : '%s'", $stdin);
	exit();
}

list($input_hour, $input_minute, $input_utc) = $inputs;

$tz = new Timezone($input_utc);
echo $tz->get_time($input_hour, $input_minute) . "\n";


class Timezone
{
	const UTC_JP = 9;

	private $_diff_time = 0;


	public function __construct($utc)
	{
		if (!$this->_check_utc_format($utc))
			return;

		$this->_diff_time = $this->_get_utc_diff_time($utc);
	}


	private function _check_utc_format($utc)
	{
		$is_valid = preg_match("/^UTC(\+|-)((1[0-3]|[0-9])(.[0-9])?|14)$/", $utc);
		if (!$is_valid)
		{
			printf("UTC format is invalid : '%s'\n", $utc);
		}
		return $is_valid;
	}


	private function _get_utc_diff_time($utc)
	{
		preg_match("/-?(1[0-4]|[0-9])(.[0-9])?/", $utc, $matches);
		return !isset($matches[0])
			? NULL
			: (float)$matches[0] - self::UTC_JP;
	}


	public function get_time($hour, $minute)
	{
		$hh = (float)$hour + (float)$this->_diff_time;

		if ($hh < 0)
		{
			$hh = $hh + 24;
		}

		$_mm = $hh > (int)$hh ? (float)($hh - (int)$hh) : 0;
		$mm = (int)$minute + (int)($_mm*60);

		if ($mm >= 60)
		{
			$hh = $hh + 1;
			$mm = $mm - 60;
		}

		return $this->_format_to_time($hh, $mm);
	}


	private function _format_to_time($hour, $minute)
	{
		$hh = $hour > 24 ? $hour - 24 : $hour;
		return sprintf("%02d:%02d", $hh, $minute);
	}
}