<?php
	$argv;
	$rules = array();
	$ifacts;
	$query;
	$alpha = array(
			'A' => false,
			'B' => false,
			'C' => false,
			'D' => false,
			'E' => false,
			'F' => false,
			'G' => false,
			'H' => false,
			'I' => false,
			'J' => false,
			'K' => false,
			'L' => false,
			'M' => false,
			'N' => false,
			'O' => false,
			'P' => false,
			'Q' => false,
			'R' => false,
			'S' => false,
			'T' => false,
			'U' => false,
			'V' => false,
			'W' => false,
			'X' => false,
			'Y' => false,
			'Z' => false, 
	);
	require('error_test.php');

	if (isset($argv[1]))
	{
		if(syntax_check($argv[1]))
		{
			echo $query . PHP_EOL;
			echo $ifacts . PHP_EOL;
			foreach ($rules as $value) {
				echo $value . PHP_EOL;
			}
		}
		else {
			echo "false";
		}
	}
	else
		echo "Error: No file given as argument" . PHP_EOL;
?>
