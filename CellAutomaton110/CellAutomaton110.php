<?php
#
# No.663 セルオートマトンの逆操作
# https://yukicoder.me/problems/no/663
#


class CellAutomaton110
{
	private $base_list = array();


	public function __construct($base_list)
	{
		$this->base_list = str_split($base_list);
	}


	public function gen_next_list()
	{
		$next_list = array();

		$list_size = count($this->base_list);
		for ($i=0; $i<$list_size; $i++)
		{
			$_next_cell = 1;

			$_left_cell   = ($i == 0) ? end($this->base_list) : $this->base_list[$i-1];
			$_center_cell = $this->base_list[$i];
			$_right_cell  = ($i == $list_size - 1) ? $this->base_list[0] : $this->base_list[$i+1];

			if ( ($_left_cell == 1 && $_center_cell == 1 && $_right_cell == 1)
				|| ($_center_cell == 0 && $_right_cell == 0) )
			{
				$_next_cell = 0;
			}

			$next_list[$i] = $_next_cell;
		}

		return implode($next_list);
	}
}
