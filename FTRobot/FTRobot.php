<?php
#
# FT Robot
# https://beta.atcoder.jp/contests/arc087/tasks/arc087_b
#

$stdin = trim(fgets(STDIN)); // 標準入力

$robot = new FTRobot($stdin);



class FTRobot
{
	private $pos_x = 0;
	private $pos_y = 0;

	private $direction;


	public function __construct($operation)
	{

	}


	public function get_pos_x()
	{
		return $this->pos_x;
	}


	public function get_pos_y()
	{
		return $this->pos_y;
	}


	public function get_position()
	{
		$position = array($this->pos_x, $this->pos_y);
		return $position;
	}
}
