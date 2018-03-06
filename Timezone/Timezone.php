<?php
#
# No.652 E869120 and TimeZone
# https://yukicoder.me/problems/no/652
#

$tz = new Timezone("UTC+12");
echo $tz->get_time(22, 20) . "\n";

class Timezone
{

	const UTC_JP = 9;

	private $_diff_time = 0;


	public function __construct($utc)
	{
		if (!$this->_check_utc_format($utc))
			return;

		$this->_diff_time = $this->_get_utc_diff_time($utc);
		echo $this->_diff_time . "\n";
	}


	private function _check_utc_format($utc)
	{
		$is_valid = preg_match("/UTC(\+|-)(1[0-4]|[0-9])/", $utc);
		if (!$is_valid)
		{
			printf("UTC format is invalid : '%s'\n", $utc);
		}
		return $is_valid;
	}


	private function _get_utc_diff_time($utc)
	{
		preg_match("/-?(1[0-4]|[0-9])/", $utc, $matches);
		return empty($matches[0])
			? NULL
			: (int)$matches[0] - self::UTC_JP;
	}


	public function get_time($hour, $minute)
	{
		$hh = (int)$hour + (int)$this->_diff_time;
		$mm = (int)$minute;
		return $this->_format_to_time($hh, $mm);
	}


	private function _format_to_time($hour, $minute)
	{
		$hh = $hour > 24 ? $hour - 24 : $hour;
		return sprintf("%02d:%02d", $hour, $minute);
	}
}