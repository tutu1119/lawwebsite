<?php
$fp = fopen('testingKeyword',"r");
$fptr = fopen('predictResult',"r");
$keyword_arr = array();
$predict_arr = array();

if($fp)
{
	while (!feof($fp)) 
	{
			$keyword_arr[] = fgets($fp);
	}
	$num = count($keyword_arr);
	//echo "1: ".count($keyword_arr);
	fclose($fp);
}
if($fptr)
{
	while (!feof($fptr)) 
	{
			$predict_arr[] = fgets($fptr);
	}
	//echo "\n2: ".count($predict_arr)."\n";
	fclose($fptr);
}

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
$res = 0;
for($temp=0; $temp<$num; $temp++)
{
	if($predict_arr[$temp]==1)
	{
		$sql = "INSERT INTO law_base.keyword_all (keyword) VALUES ('".$keyword_arr[$temp]."');";
		mysql_query($sql) or die('error');
		$res++;
	}
}
echo "res: ".$res."\n";
?>
