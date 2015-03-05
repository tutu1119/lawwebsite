<?php
	// link to database
	$link = mysql_connect('localhost', 'root', 'password');
	if (!$link) {
    	die('Could not connect: ' . mysql_error());
	}
	else
	{
		echo "Connected successfully\n";
	}
	$db_selected = mysql_select_db('law_base', $link);
	if (!$db_selected) 
	{
    	die ("Can\'t usefoo : " . mysql_error());
	}
	echo "switch to db successfully\n";
	mysql_query("SET NAMES 'utf8'");
	$sql = "SELECT lawtext_id,lawtext_name FROM text_dir WHERE 1";
	$lawid_temp = mysql_query($sql);
	while($lawid_array =  mysql_fetch_array($lawid_temp))
	{
		
		echo $lawid_array['lawtext_id']."\n";
		$fp = fopen("lawBase_new/". $lawid_array['lawtext_name'].".txt", 'w');
		$sql = "SELECT context FROM ".$lawid_array['lawtext_id']." WHERE 1";
		$context_temp = mysql_query($sql);
		while($context_arr =  mysql_fetch_array($context_temp))
		{
			$space="\\$";
			$context_arr['context'] = ereg_replace($space,"：\n",$context_arr['context']);
			$space="。";
			$context_arr['context'] = ereg_replace($space,"。\n",$context_arr['context']);
			$space="@";
			$context_arr['context'] = ereg_replace($space,"。\n",$context_arr['context']);
			//echo $context_arr['context'];
			fwrite($fp,$context_arr['context']);
		}
		fclose($fp);
	}
?>
