<?php
	//宣告固定的句子
	$sentence_deleted="（刪除）";
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
	//G0400001:證券交易法
	$sql = "SELECT context FROM G0400001 WHERE 1";
	$context_temp = mysql_query($sql);
	while($context_arr =  mysql_fetch_array($context_temp))
	{
		//將每欄法規條文切割成句子單位，		
		//cut_to_sentence
		//將資料庫中儲存的特殊符號還原回來	
		$space="\\$";
		$context_arr['context'] = ereg_replace($space,"：",$context_arr['context']);
		$space="@";
		$context_arr['context'] = ereg_replace($space,"。",$context_arr['context']);	
		/*
		 $context_arr['context']:條文原本內容
		 $context_tag:經過分詞後之結果
		如果條文已被刪除，則不做處理
		*/
		if($context_arr['context'] != $sentence_deleted)
		{
		
			//由ICTCLAS做分詞，$context_tag為分詞結果
			exec("./forPhp_dividWordByICTCLAS.o ".$context_arr['context'], $tagging_temp, $return_var);
			$context_tag = $tagging_temp[0];
			//print_r($tagging_temp);
			unset($tagging_temp);//清空該次結果之arr
			
			//echo "\n".$context_arr['context']."\n";//1
			//echo $context_tag."\n";//2
		
			//by ICTCLAS，判斷是否有列點式，回傳條列式個數
			$row_number = bool_have_row($context_tag);
			echo $row_number."\n";
			//判斷是否match pattern
				
		}
	}
function bool_have_row($input) //檢查是否為條列式，以及條列式各數
{
	//echo "\n原本含有句子: ".$input."\n";
	//將分詞結果只保留post_tagging
	$NUM = "m";		//數詞
	$COMMA = "wn";	//頓號
	$row_count = 0;
	$only_tag = array();
	
	$arr_temp = explode(' ',$input);
	foreach ($arr_temp as &$value)
	{
		$temp = explode('/',$value); 
		$only_tag[] = $temp[1];
	}
	//var_dump($only_tag);
	//檢查是否有"/m+/wn"的狀況
	for($count=0; $count<count($only_tag); $count++)
	{
		if($only_tag[$count] == $NUM)
		{
			//echo $only_tag[$count]."\t";
			$count++;
			if($count<count($only_tag))
			//代表還不是最後一個字詞
			{
				if($only_tag[$count] == $COMMA)
				{
					$row_count++;
					//echo $only_tag[$count]."\t-----------\n";
				}
				$count--;//退回一格
			}
		}	
	}
	return($row_count);
	//sleep(5);
}
?>
