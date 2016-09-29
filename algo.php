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
				else if ($char == '0')
					return (0);
				else if ($GLOBALS['alpha'][$char] == 0)
					return (0);
		}
		return (1);
	}

	function or_op($command)
	{
		$coms = explode("|", trim($command));
		foreach ($coms as $value)
		{
			if (and_op(trim($value)) == 1)
				return (1);
		}
		return (0);
	}

	function xor_op($coms)
	{
		$new = array();
		if (count($coms) == 1)
			return (or_op($coms[0]));
		for ($i = 0; $i < count($coms); $i++) {
			if ($i == count($coms) - 1)
			{}
			else if (or_op($coms[$i]) == or_op($coms[$i + 1]))
				$new[] = 0;
			else
				$new[] = 1;
		}
		if (count($new) == 1)
			return $new[0];
		else
			return (xor_op($new));
	}

	function rightside_check($command)
	{
		$command = preg_replace('/\s+/', '', $command);
		$line = str_split($command);
		var_dump($line);
	}
	function implies($value)
	{
		$commands = explode("=>", $value);
		$coms = explode("^", $commands[0]);
		$ret = xor_op($coms);
		rightside_check($commands[1]);
	}

	function algo() {
		//Loop through rules until it reaches the count of rules
		foreach ($GLOBALS['rules'] as $value) {
			echo $value . PHP_EOL;
			//brackets
			echo "implies return " . implies($value) . PHP_EOL;
		}
	}
?>
