<?php
#
# FT Robot
# https://beta.atcoder.jp/contests/arc087/tasks/arc087_b
#

$stdins = array();

while (TRUE)
{
	$stdin = trim(fgets(STDIN));
	if ($stdin === '')
	{
		$operation_seq = $stdins[0];
		$destination = explode(' ', $stdins[1]);

		$robot = new FTRobot($operation_seq);
		$result = $robot->simulate($destination[0], $destination[1]);
		echo ($result) ? "YES\n" : "NO\n";
		return;
	}
	$stdins[] = $stdin;
}


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
	private $direction = 1;
	private $operation_seq;

	private $turn_count = 0;
	private $turn_pattern_index;


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


	public function init_position()
	{
		$this->pos_x = 0;
		$this->pos_y = 0;
	}


	public function init_direction()
	{
		$this->direction = self::DIRECT_EAST;
	}


	/**
	 * 命令列をすべて実行
	 */
	public function exec($operation_seq = NULL)
	{
		$_operation_seq = (is_null($operation_seq))
			? $this->operation_seq
			: $operation_seq;
		$operation_arr = str_split($_operation_seq);

		if (!isset($this->turn_pattern_index))
		{
			$this->init_turn_pattern();
		}

		$this->init_direction();

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
				$this->pos_x -= 1;
				break;
			
			default:
				break;
		}
		
	}


	/**
	 * 90度回転
	 */
	private function _turn()
	{
		$direction_to = ($this->turn_pattern_bit[$this->turn_count] == '1') ? -1 : 1;
		$this->direction = ($this->direction + $direction_to) % 4;
		if ($this->direction < 0)
		{
			$this->direction += 4;
		}

		$this->turn_count += 1;
	}


	/**
	 * 想定される命令列をすべて実行してみる
	 */
	public function simulate($dest_x, $dest_y)
	{
		$turn_length = mb_substr_count($this->operation_seq, self::OPERATION_TURN);
		$turn_pattern_max = pow(2, $turn_length);

		for ($i=0; $i < $turn_pattern_max; $i++)
		{
			$this->init_position();
			$this->init_turn_pattern($i);
			$this->exec();

			$pos_x = $this->get_pos_x();
			$pos_y = $this->get_pos_y();
			echo "($pos_x, $pos_y)\n";

			if ($pos_x == $dest_x && $pos_y == $dest_y)
				return TRUE;
		}

		return FALSE;
	}


	public function init_turn_pattern($index = NULL)
	{
		$this->turn_count = 0;

		$turn_length = mb_substr_count($this->operation_seq, self::OPERATION_TURN);
		$turn_pattern_max = pow(2, $turn_length);

		if (!is_null($index) && $index >= 0 && $index < $turn_pattern_max)
		{
			$this->turn_pattern_index = $index;
		}
		else
		{
			// ランダムでセットする
			$this->turn_pattern_index = mt_rand(0, $turn_pattern_max - 1);
		}

		$this->turn_pattern_bit = $this->_get_turn_pattern_bit($this->turn_pattern_index);
	}


	private function _get_turn_pattern_bit($turn_pattern_index)
	{
		$turn_length = mb_substr_count($this->operation_seq, self::OPERATION_TURN);
		$turn_pattern_bit_str = str_pad(decbin($turn_pattern_index), $turn_length, '0', STR_PAD_LEFT);

		return str_split($turn_pattern_bit_str);
	}

}
