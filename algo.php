<?php
function and_op($command)
{
	$command = preg_replace('/\s+/', '', $command);
	$coms = explode("+", $command);
	foreach ($coms as $char)
	{
		if (ctype_alpha($char))
			$char = find_fact($char);
		if (substr($char, 0, 1) == "!")
		{
			$char = substr($char, 1, 2);
			if (ctype_alpha($char))
				$char = find_fact($char);
			if ($char == 1)
				return (0);
		}
		else if ($char == '0')
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

function change_alpha($command)
{
	$coms = str_split($command);
	foreach ($coms as $char)
	{
		if (ctype_alpha($char))
			$command = str_replace($char, $GLOBALS['alpha'][$char], $command);
	}
	return ($command);
}

function implies($value)
{
 	$commands = explode("=>", $value);
	$coms = explode("^", $commands[0]);
	$ret = xor_op($coms);
	return ($ret);
}

function ifandonlyif($value, $let)
{
	$commands = explode("<=>", $value);
	$coms = explode("^", $commands[0]);
	$out1 = xor_op($coms);
	$commands[1] = change_alpha($commands[1]);
	$coms = explode("^", $commands[1]);
	$out2 = xor_op($coms);
	echo "$out1 == $out2\n";
	if ($out1 == $out2)
		return (1);
	else
		return (0);
}

function solve($value, $let)
{
  	$commands = explode(">", $value);
	if (strpos($commands[0],"("))
	{
	 	$com = substr($commands[0], strpos($commands[0],"("), strpos($commands[0],")") - strpos($commands[0],"("));
		$com[0] = "";
		$ret = solve($com);
		$replace = substr($commands[0], strpos($commands[0],"("), strpos($commands[0],")") - strpos($commands[0],"(") + 1);
		$commands[0] = str_replace($replace, $ret, $commands[0]);
		$value = $commands[0] . $commands[1];
	}
	if (strpos($value, "<=>") !== false)
		return (ifandonlyif($value, $let));
	else
		return (implies($value));
	return (0);
}

function find_fact($letter)
{
	$GLOBALS['alpha'][$loop]++;
	if ($GLOBALS['alpha'][$loop] > count($GLOBALS['rules']))
	{
		echo "Error: There is a contradiction in the facts\n";
		exit(0);
	}
	foreach ($GLOBALS['rules'] as $value)
	{
		if (strpos($value, $letter) !== false)
		{
			$com = str_split($value);
			$i = count($com) - 1;
			while ($com[$i] != ">")
			{
				if ($com[$i] == $letter)
					return (solve($value, $letter));
				$i--;
			}

		}
	}
	return($GLOBALS['alpha'][$letter]);
}

function algo()
{
	$GLOBALS['query'] = substr($GLOBALS['query'], 1);
	$query = str_split($GLOBALS['query']);
	foreach ($query as $let)
	{
		$GLOBALS['alpha'][$loop] = 0;
		if (find_fact($let))
		{
			echo "$let is true" . PHP_EOL;
		}
		else
		{
			echo "$let is false" . PHP_EOL;
		}
	}
}
?>
