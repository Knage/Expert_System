<?php
	$argv;
	$rules = array();
	$ifacts;
	$query;
	

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
