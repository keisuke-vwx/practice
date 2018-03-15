<?php
#
# No.320 眠れない夜に
# https://yukicoder.me/problems/no/320
#
require_once('../util/TwoOperations/TwoOperations.php');


class FibonacciSheep extends TwoOperations
{
	const OFFSET = 2;

	private $count;
	private $miss_count;
	private $sheep;
	private $last_sheep;
	private $sheep_array = array();
	private $miss_count_array = array();


	public function __construct($count, $last_sheep)
	{
		parent::__construct($count - self::OFFSET);

		$this->last_sheep = $last_sheep;

		$this->init_operation();
	}


	protected function on_bit_func()
	{
		$sheep = $this->calc_fibonacci_sheep($this->count) - 1;
		$this->sheep_array[] = $sheep;
		$this->count++;
		$this->miss_count++;
	}


	protected function off_bit_func()
	{
		$sheep = $this->calc_fibonacci_sheep($this->count);
		$this->sheep_array[] = $sheep;
		$this->count++;
	}


	protected function init_operation()
	{
		$this->count = self::OFFSET + 1;
		$this->miss_count = 0;
		$this->sheep = 0;
		$this->sheep_array = array(1, 1);
	}


	protected function operation_done()
	{
		$this->sheep = end($this->sheep_array);
		if ($this->sheep == $this->last_sheep)
			$this->miss_count_array[] = $this->miss_count;
	}


	public function calc_fibonacci_sheep($i)
	{
		return $this->sheep_array[$i-2] + $this->sheep_array[$i-3];
	}

	public function get_miss_count_array()
	{
		return !empty($this->miss_count_array)
			? min($this->miss_count_array)
			: -1;
	}

}


if (!isset($argv[1]) || !isset($argv[2]))
{
	echo "missing 2 args.\n";
	exit;
}
else if (!is_int((int)$argv[1]) 
		 || !is_int((int)$argv[2])
		 || $argv[1] < 3
		 || $argv[1] > 80
		 || $argv[2] < 1
		)
{
	echo sprintf("invalid arg :%s, %s\n", $argv[1], $argv[2]);
	exit;
}


$fibo_sheep = new FibonacciSheep($argv[1], $argv[2]);
$fibo_sheep->exec();
echo $fibo_sheep->get_miss_count_array() . "\n";
