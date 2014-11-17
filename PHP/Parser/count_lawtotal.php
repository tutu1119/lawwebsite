<?php
	// link to database
	$link = mysql_connect('localhost', 'root', 'password');
	if (!$link) {
    	die('Could not connect: ' . mysql_error());
	}
	echo "Connected successfully\n";
	$db_selected = mysql_select_db('law_base', $link);
	if (!$db_selected) 
	{
    	die ("Can\'t usefoo : " . mysql_error());
	}
	mysql_query("SET NAMES 'utf8'");
	echo "switch to db successfully\n";
	
	//依類別新增
	$Law_array = array();
	$sql="SELECT * FROM text_dir";
	$result = mysql_query($sql);
	$law_size = 0;
	$total =0;
	while($row = mysql_fetch_array($result))
	{
		$Law_array[$law_size]['id'] = $row['lawtext_id'];
		$sql = "SELECT is_chapter FROM ".$Law_array[$law_size]['id']." WHERE is_chapter IS NULL or is_chapter=0";
		//echo $sql;
		$temp = mysql_query($sql);
		$t_count = 0;
		 while($row_temp = mysql_fetch_array($temp))
	    {
			$t_count++;
		}
		echo "each table's law number:\t".$t_count."\n";
		$total+=$t_count;
		//$Law_array[$law_size]['name'] = $row['lawtext_name'];
		$law_size++;
	}
	echo "table number:\t".$law_size."\n";
	echo "Total lawtext sum:\t".$total."\n";
?>
