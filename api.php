<?php
const KEYS_COUNT = 1;
const KEYS_LENGTH = 25;
const USE_DELIMITR = true;
const DELIMITR_LENGTH = 5;

$keys = array();
$output = '';

for($i = 1; $i <= KEYS_COUNT; $i++)
{
	$symb = strtoupper(sha1(microtime() . md5(rand(1, time()))));
	if(USE_DELIMITR === false)
	{
		$keys[] = substr($symb, 0, KEYS_LENGTH);
	}
	else
	{
		$tmp_key = '';
		for($j = 1; $j <= KEYS_LENGTH; $j++)
		{
			$tmp_key .= $symb[$j];
			if($j % DELIMITR_LENGTH == 0 and $j !== KEYS_LENGTH)
				$tmp_key .= '-';
		}
		$keys[] = $tmp_key;
	}
}


foreach($keys as $key)
{
	$output .= $key . '<br />';
}

echo $output;
?>