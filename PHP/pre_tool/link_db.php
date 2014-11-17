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

$read_id = array();
$fp = fopen("law_type/通則.txt","r");
while(!feof($fp))
{
	$read_id[] = fgets($fp);
}
//r_dump($read_id);
$file_count = count($read_id); 
//echo $file_count;
//$law_info = explode(",", $read_id[0]);
//var_dump(trim($pieces[1]));

for($temp =0;$temp < $file_count ; $temp++)
{
	$law_info = explode(",", $read_id[$temp]);
	$sql="INSERT INTO law_base.text_dir (lawtext_id,kind,lawtext_name) VALUES ('".$law_info[0]."',3,'".trim($law_info[1])."');";
	//echo $sql."\n";
	mysql_query($sql) or die("insert error");
}
mysql_close($link);
fclose($fp);
?>
