<?php
	include "/home/tutu/PHP/rule.php";
    //print_r($rule);
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

	//計算全部總數
	$lawid_counter=0; //該總類法規數量
	$field_number = 0;//法規條文欄位
	$sentence_number = 0;//切割後句子單位
	$match_number = 0;
	$sql = "SELECT lawtext_id FROM `text_dir` WHERE 1";
	$lawid_temp = mysql_query($sql);
	while($lawid_array =  mysql_fetch_array($lawid_temp))
	{
		$sql ="SELECT * FROM ".$lawid_array['lawtext_id']." WHERE is_chapter IS NULL";
		$clause_temp = mysql_query($sql);

		while($res =  mysql_fetch_array($clause_temp))
		{
			//echo $res['num']."\t".$res['context']."\n";
			$temp_count = substr_count($res['context'],"。");
			//echo $temp_count."\t";
			if($temp_count==0) //刪除
			{
				//echo $res['num']."\t".$res['context']."\n";
				$update_str = $res['context']."@";
			}
			elseif($temp_count==1) //只有一行
			{
				//echo $res['num']."\t".$res['context']."@\n";
				$update_str = $res['context']."@";
			}
			else
			{
				$clause_cut = array();//儲存合併的結果
				$clause_count = 0; //clause_cut counter
				$mergekey = 0;
				$cut_temp = explode("。",$res['context']);
				for($count=0; $count<count($cut_temp); $count++)
				{
					// to check the end of the sentence contains : or not
					$pos = strpos($cut_temp[$count],"：");
					if($pos != false)
					{
						$clause_cut[$clause_count] = $cut_temp[$count]."。";
						$count++;//看下一行
						$mergekey = itemornot(trim($cut_temp[$count]));//檢查是否為列點式
						while(($mergekey==1))
						{
							$clause_cut[$clause_count] .= $cut_temp[$count]."。";
							$count++;
							$mergekey = itemornot(trim($cut_temp[$count]));
						}
						 $clause_cut[$clause_count] .="@";	
						$clause_count++;
						$count--;
					}
					else if($pos === false && ($cut_temp[$count]!=null))
					{
						$clause_cut[$clause_count] = $cut_temp[$count]."。@";//加上結尾	
						$clause_count++;
					}
				}
				//var_dump($cut_temp);
				//var_dump($clause_cut);//result
				/*if(count($clause_cut)>1)
				{
					echo $res['num']."\n";
					var_dump($clause_cut);
				}*/
				$update_str = implode("",$clause_cut);
			}
			//echo "\n------\n".$res['num']."\n";
			//echo $update_str."\n";
			$sql="UPDATE ".$lawid_array['lawtext_id']." SET context='".$update_str."' WHERE num = '".$res['num']."';";
			mysql_query($sql);
			
		}
	}
	//print_r($clause_temp);
function itemornot($getnext)
{
	$list_number = array(
	1 => "/^一、(.*)/",
	2 => "/^二、(.*)/",
	3 => "/^三、(.*)/",
	4 => "/^四、(.*)/",
	5 => "/^五、(.*)/",
	6 => "/^六、(.*)/",
	7 => "/^七、(.*)/",
	8 => "/^八、(.*)/",
	9 => "/^九、(.*)/",
	10 => "/^十、(.*)/",
	11 => "/^十一、(.*)/",
	12 => "/^十二、(.*)/",
	13 => "/^十三、(.*)/",
	14 => "/^十四、(.*)/",
	15 => "/^十五、(.*)/"
	);
	$check_item = 0;
	foreach($list_number as $list_item)
	{
		if(preg_match($list_item,$getnext))
		{
			$check_item = 1; //是子項目則變數為1
		}
	}
	return $check_item; 
}
?>

