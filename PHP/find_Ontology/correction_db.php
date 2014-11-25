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
	$sql = "SELECT lawtext_id,lawtext_name FROM text_dir WHERE 1";
	$lawid_temp = mysql_query($sql);
	while($lawid_array =  mysql_fetch_array($lawid_temp))
	{
		//echo $lawid_array['lawtext_id']."\n";
		$sql = "alter ignore table ".$lawid_array['lawtext_id']." add unique index(num)";
		mysql_query($sql);
	}
?>
