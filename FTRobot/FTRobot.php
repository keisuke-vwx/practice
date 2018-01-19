<?php
#
# FT Robot
# https://beta.atcoder.jp/contests/arc087/tasks/arc087_b
#

$stdin = trim(fgets(STDIN)); // 標準入力

$robot = new FTRobot($stdin);
$robot->exec();
$pos_x = $robot->get_pos_x();
$pos_y = $robot->get_pos_y();
echo "($pos_x, $pos_y)\n";


class FTRobot
{
	const DIRECT_NORTH = 0;
	const DIRECT_EAST  = 1;
	const DIRECT_SOUHT = 2;
	const DIRECT_WEST  = 3;

	const OPERATION_FORWARD = 'F';
	const OPERATION_TURN    = 'T';

	private $pos_x = 0;
	private $pos_y = 0;
	private $direction = 0;
	private $operation_seq;


	public function __construct($operation_seq)
	{
		$this->set_operation($operation_seq);
	}


	public function set_operation($operation_seq)
	{
		$this->operation_seq = $operation_seq;
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


	/**
	 * 命令列をすべて実行
	 */
	public function exec()
	{
		$operation_arr = str_split($this->operation_seq);

		foreach ($operation_arr as $_opr)
		{
			$this->_exec($_opr);
		}
	}


	/**
	 * 指定した1つの命令を実行
	 */
	private function _exec($operation)
	{
		if ($operation == self::OPERATION_FORWARD)
		{
			$this->_forward();
		}
		else if ($operation == self::OPERATION_TURN)
		{
			$this->_turn();
		}
		else
		{
			echo sprintf("[ERROR] Invalid oparation : %s\n", $operation);
			return;
		}
	}


	/**
	 * 今向いている向きに長さ 1 だけ移動
	 */
	private function _forward()
	{
		$direction = $this->direction;
		switch ($direction)
		{
			case self::DIRECT_NORTH:
				$this->pos_y += 1;
				break;

			case self::DIRECT_EAST:
				$this->pos_x += 1;
				break;

			case self::DIRECT_SOUHT:
				$this->pos_y -= 1;
				break;

			case self::DIRECT_WEST:
				$this->pos_y -= 1;
				break;
			
			default:
				break;
		}
		
	}


	/**
	 * 時計回りに90度回転
	 */
	private function _turn()
	{
		$this->direction = ($this->direction + 1) % 4;
	}
}
