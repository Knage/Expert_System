<?php
	$argv;
	$rules = array();
	$ifacts;
	$query;
	$alpha = array(
			'A' => 0,
			'B' => 0,
			'C' => 0,
			'D' => 0,
			'E' => 0,
			'F' => 0,
			'G' => 0,
			'H' => 0,
			'I' => 0,
			'J' => 0,
			'K' => 0,
			'L' => 0,
			'M' => 0,
			'N' => 0,
			'O' => 0,
			'P' => 0,
			'Q' => 0,
			'R' => 0,
			'S' => 0,
			'T' => 0,
			'U' => 0,
			'V' => 0,
			'W' => 0,
			'X' => 0,
			'Y' => 0,
			'Z' => 0,
	);
	$loop = 0;

	require('error_test.php');
	require('algo.php');

	function iscontridicting()
	{
		$letters = array();
		foreach ($GLOBALS['rules'] as $line)
		{

		}
	}

	if (count($argv) == 2)
	{
		if(syntax_check($argv[1]))
		{
			$ifacts = trim(preg_replace('/\s+/', '', $ifacts));
			$test = str_split($ifacts);
			foreach ($test as $value)
			{
				if ($value != "=")
				{
					$alpha[$value] = 1;
				}
			}
			algo();
		}
		else
		{
			echo "Error: Syntax Error" . PHP_EOL;
		}
	}
	else
		echo "Error: Incorrect number of arguments" . PHP_EOL;
?>
