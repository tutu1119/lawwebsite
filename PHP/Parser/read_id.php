<?php
$fp = fopen("123.txt","r");
$fptr = fopen("law_dirid.txt","w");
$read_id = array();
while(!feof($fp))
{
	$read_id[] = fgets($fp);
}
$pattern_li='/(.*)id="(.*)">(.*)<\/a>/';
$pattern_dir='/(.*)"#">(.*)<\/a>/';
$count = 0; 
$count_1 = 0;
echo $arr_size = count($read_id);
for($i=0 ; $i<$arr_size; $i++)
{
	//echo $read_id[$i];
	if(preg_match($pattern_dir,$read_id[$i],$res))
	{
		//print_r($res);
		echo $res[2]."\n";
		//fputs($fptr,"$res[2]\n");
		$count++;
	}
	else if(preg_match($pattern_li,$read_id[$i],$res))
	{
		echo $res[2]."\t".$res[3]."\n";
		fputs($fptr,"$res[2]\n");
		$count_1++;
	}
}
echo $count."\n";
echo $count_1."\n";
fclose($fptr);
fclose($fp);
?>
