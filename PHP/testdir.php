<?php
//將全部檔案條文加入[第N條]aaaaaa

//readdir
$path = "../notUseData/";
if(is_dir($path))
{
	$filename_arr = glob($path.'*.txt',GLOB_BRACE);
	foreach ($filename_arr as &$value) 
	{
		$value = trim(str_replace ($path,"",$value)); //切割檔名
	}
	//echo  count($filename_arr);
	//var_dump($filename_arr);
}
for($lcount=0; $lcount<count($filename_arr);$lcount++)
{	
	$fptr = fopen($path.$filename_arr[$lcount], "r");
	$fwrite = fopen("../clean_data/".$filename_arr[$lcount], "w");
	if ($fptr)
	{
		while (!feof($fptr))
		{
				//fgets為每次讀取一列文字
				$context = fgets($fptr);
				$context = str_replace(" ","",$context);
				
				$cut_head = "/^第[0-9]?[0-9]?[0-9]條(.*)/"; //過濾開頭第a項
				$head_baseline = "/^第[0-9]?[0-9]?[0-9]-[0-9]?[0-9]?[0-9]條(.*)/";
				if(preg_match($cut_head,$context))
				{
					preg_match($cut_head,$context,$out);
					$out[1] = preg_replace('/[\n\r\t]/','', $out[1]); //濾掉空格，換行
					$item = str_replace($out[1],'',$context);
					$item = preg_replace('/[\n\r\t]/','', $item);
					$context = '['.$item.']'.$out[1];
				}
				else if(preg_match($head_baseline,$context)) //Ex:12-2
				{
					preg_match($head_baseline,$context,$out);
					$out[1] = preg_replace('/[\n\r\t]/','', $out[1]);
					$item = str_replace($out[1],'',$context);
					$item = preg_replace('/[\n\r\t]/','', $item);
					$context = '['.$item.']'.$out[1];				
				}
				else
				{
					$context = preg_replace('/[\n\r\t]/','',$context);
				}
				//echo $context."\n";
				fwrite($fwrite,"\n".$context);
		}		
	}
	fclose($fptr);
	fclose($fwrite);
}
?>