<?php

$fp = fopen("law_temp.txt","w");
/*
$fptr = fopen("法.txt","w");
$fpoint = fopen("法_id.txt","w");
$dir_id =array();//每個目錄的連結位置
$difinition_arr = array("/(.*)法$/","/(.*)律$/","/(.*)條例$/","/(.*)通則$/"); //法律定義
$pattern_filter="/(.*)辦法$/";//濾掉"辦法"
while(!feof($fp))
{
    $dir_id[] = fgets($fp);
}
echo $dir_id[237];
$dir_size = count($dir_id);
$definition_law_total = 0;
$total_law = 0;
//echo $dir_size."XDDD\n";
*/
/*for($dir_count=10; $dir_count<12; $dir_count++)
{*/
	$dir_count='02000000'; 
	echo "\n".$dir_count."-----------------------------\n";
	//$definition_law_count = 0;//符合法律定義的總數
	$ch = curl_init();
	$options = array(CURLOPT_URL =>'http://law.moj.gov.tw/LawClass/LawClassListN.aspx?TY=02000000',
	CURLOPT_HEADER => false,
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_USERAGENT => "Google Bot",
	CURLOPT_FOLLOWLOCATION => true
	);
	curl_setopt_array($ch, $options);
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;

	$law_link = array();
	//cut the part wanted
	$cut_table = explode("classtitle",$output);
	$temp = explode("</table>",$cut_table[1]);
	$table = $temp[0];
	//echo $table;

	//cut out each link
	$pattern ='/(.*)" title="(.*)">/';
	$res = explode('Hot/AddHotLaw.ashx?PCode=',$table);
	foreach($res as $item)
	{
		 $temp = explode('</a>',$item);
		 $law_link[] = $temp[0];
	}
	//var_dump($law_link);
	array_shift($law_link);//第一項固定為無用的，移除
	//echo "連結:".count($law_link)."\n";
	$ecah_law = 0;
	$each_law = count($law_link);
	echo $each_law."\n";
	//$total_law += $each_law;
	//echo "\n----------------------\n";
	//$count = 0;
	//judge the law name	
	foreach($law_link as $count=>$item)
	{
		preg_match($pattern,$item,$res);
		$law_info[$count]['law_id'] = trim($res[1]);
		$law_info[$count]['law_name'] = trim($res[2]);

		echo $law_info[$count]['law_id']."\n";
		fwrite($fp,$law_info[$count]['law_id']."\n");
	}
	foreach($law_link as $count=>$item)
	{
		echo $law_info[$count]['law_name']."\n";
		fwrite($fp,$law_info[$count]['law_name']."\n");
		//for($judge_count=0; $judge_count<4; $judge_count++)
		//{
			//if (preg_match($difinition_arr[$judge_count],$law_info[$count]['law_name']))
/*			if (preg_match($difinition_arr[0],$law_info[$count]['law_name']))
			{
				if(!preg_match($pattern_filter,$law_info[$count]['law_name']))
				{
					//echo $law_info[$count]['law_name']."\n";
					fwrite($fptr,$law_info[$count]['law_name'].",\n");
					fwrite($fpoint,$law_info[$count]['law_id'].",\n");
					$definition_law_count++;
				}
			}
		//}
		//echo "\n------------------\n";
		$count++;
*/
		//print_r($res);
	}	

	//print_r($law_info);
	//echo $definition_law_count."\t";
	//$definition_law_total += $definition_law_count;
	//echo $definition_law_total."\n------------------------------\n"; 

	echo "\n--------------------------------------------------------\n";
//}
/*
echo "\n------------------\n全部現行法規:\t".$total_law; 
echo "\n------------------\n符合定義:\t".$definition_law_total; 
fclose($fptr);
fclose($fpoint);*/
fclose($fp);

?>
