<?php
#
# FT Robot
# https://beta.atcoder.jp/contests/arc087/tasks/arc087_b
#
require_once('../util/TwoOperations/TwoOperations.php');


class FTRobot2 extends TwoOperations
{
	const DIRECT_NORTH = 0;
	const DIRECT_EAST  = 1;
	const DIRECT_SOUHT = 2;
	const DIRECT_WEST  = 3;

	const OPERATION_FORWARD = 'F';
	const OPERATION_TURN    = 'T';

	const TRUN_TO_LEFT  = -1;
	const TRUN_TO_RIGHT = 1;

	private $pos_x = 0;
	private $pos_y = 0;
	private $direction = 1;
	private $operation_seq = array();
	private $operation_seq_index = 0;

	private $dest_pos_x = 0;
	private $dest_pos_y = 0;

	private $result = FALSE;


	public function __construct($operation_seq)
	{
		$this->set_operation($operation_seq);
		$max_turn_count = mb_substr_count($operation_seq, self::OPERATION_TURN);

		parent::__construct($max_turn_count);
	}


	protected function on_bit_func()
	{
		$this->_move();
		$this->_turn_left();
	}


	protected function off_bit_func()
	{
		$this->_move();
		$this->_turn_right();
	}


	protected function init_operation()
	{
		$this->init_position();
		$this->init_direction();
		$this->operation_seq_index = 0;
	}


	protected function operation_done()
	{
		$this->_move();

		$pos_x = $this->get_pos_x();
		$pos_y = $this->get_pos_y();
		echo "($pos_x, $pos_y)\n";

		if ($pos_x == $this->dest_pos_x && $pos_y == $this->dest_pos_y)
			$this->result = TRUE;
	}


	public function set_operation($operation_seq)
	{
		$this->operation_seq = str_split($operation_seq);
	}


	public function get_pos_x()
	{
		return $this->pos_x;
	}


	public function get_pos_y()
	{
		return $this->pos_y;
	}


	public function init_position()
	{
		$this->pos_x = 0;
		$this->pos_y = 0;
	}


	public function init_direction()
	{
		$this->direction = self::DIRECT_EAST;
	}


	private function _move()
	{
		$move_limit = count($this->operation_seq);
		$start = $this->operation_seq_index;
		for ($i=$start; $i < $move_limit; $i++)
		{ 
			$this->operation_seq_index +=1;

			$_operation = $this->operation_seq[$i];
			if ($_operation == self::OPERATION_FORWARD)
			{
				$this->_forward();
			}
			else if ($_operation == self::OPERATION_TURN)
			{
				break;
			}
			else
			{
				echo sprintf("[ERROR] Invalid oparation : %s\n", $_operation);
				return;
			}
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
				$this->pos_x -= 1;
				break;
			
			default:
				break;
		}
	}


	/**
	 * 右に90度回転
	 */
	private function _turn_right()
	{
		$this->_turn(self::TRUN_TO_RIGHT);
	}


	/**
	 * 左に90度回転
	 */
	private function _turn_left()
	{
		$this->_turn(self::TRUN_TO_LEFT);
	}


	/**
	 * 90度回転
	 */
	private function _turn($direction_to)
	{
		$this->direction = ($this->direction + $direction_to) % 4;
		if ($this->direction < 0)
		{
			$this->direction += 4;
		}
	}


	private function _set_dest_position($dest_x, $dest_y)
	{
		$this->dest_pos_x = $dest_x;
		$this->dest_pos_y = $dest_y;
	}


	/**
	 * 想定される命令列をすべて実行してみる
	 */
	public function simulate($dest_x, $dest_y)
	{
		$this->_set_dest_position($dest_x, $dest_y);
		$this->exec();
		return $this->result;
	}


	private function _get_max_turn_count()
	{
		return mb_substr_count($this->operation_seq, self::OPERATION_TURN);
	}

}


$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		$operation_seq = $stdins[0];
		$destination = explode(' ', $stdins[1]);

		$robot = new FTRobot2($operation_seq);
		$result = $robot->simulate($destination[0], $destination[1]);
		echo ($result) ? "YES\n" : "NO\n";
		return;
	}
	$stdins[] = $stdin;
}
