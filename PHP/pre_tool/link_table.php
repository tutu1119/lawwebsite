<?php
$file = fopen("../csv_data/下水道法.txt", "r");
$filename = "下水道法".".txt";
//echo $filename;;
$count = 0;

//link DB
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

while(!feof($file))
{
    $temp = fgetcsv($file);
	if($temp[0] != null && $temp[0] !== $filename)
	{
		//echo $temp[0]."XDDD\n";
		$pattern="/\[(.*)\](.*)/";
		if(preg_match($pattern,$temp[0]))
		{
			preg_match($pattern,$temp[0],$res);
			$sql="INSERT INTO text_0 (is_chapter,num,context) VALUES (NULL,'".$res[1]."','".$res[2]."');";
			mysql_query($sql) or die('error');
		}
		else
		{
			$sql="INSERT INTO text_0 (is_chapter,num,context) VALUES (1,NULL,'".$temp[0]."');";
            mysql_query($sql) or die('error');
		}
		//preg_match($pattern,$temp[0],$res);
		//print_r($res);
		$count++;
	}
}
echo $count;
fclose($file);
?>
