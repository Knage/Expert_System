<?php

	function and_op($command)
	{
		$command = preg_replace('/\s+/', '', $command);
		$coms = explode("+", $command);
		foreach ($coms as $char)
		{
				if (substr($char, 0, 1) == "!")
				{
					$char = substr($char, 1, 2);
					if ($GLOBALS['alpha'][$char] != 0)
						return (0);
				}
				else if ($char == 0)
					return (0);
				else if ($GLOBALS['alpha'][$char] == 0)
					return (0);
		}
		return (1);
	}

	function or_op($command)
	{
		$coms = explode("|", $command);
		$length = count($coms) / 2;
		for ($i=0; $i != length; $i++) {
			$left = and_op($coms[0]);
			$right = and_op($coms[1]);
		}
	}

	function algo() {
		foreach ($GLOBALS['rules'] as $value) {
			echo $value . PHP_EOL;
			//brackets
			$commands = explode("=>", $value);
			echo or_op($commands[0]) . PHP_EOL;
		}
	}
?>
