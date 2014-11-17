<?php
	include "../rule.php";

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
	//句子開頭會因為"法" "條例" "通則"而有所不同
	$head_pattern = "/^本通則所(.*)/";
	$head_pattern_2 = "/^本通則(.*)/";
	//計算全部總數
	$lawid_counter=0; //該總類法規數量
	$field_number = 0;//法規條文欄位
	$sentence_number = 0;//切割後句子單位
	$match_number = 0;
	
	$sql = "SELECT lawtext_id FROM text_dir WHERE kind=3";
	$lawid_temp = mysql_query($sql);
	
	while($lawid_array =  mysql_fetch_array($lawid_temp))
	{
		$Clause_array = array();
		$res = array();
		$sql ="SELECT * FROM  ".$lawid_array['lawtext_id']." WHERE is_chapter IS NULL";
		$clause_temp = mysql_query($sql);
		
		$law_size = 0;
		$rule_size = count($rule); //pattern
		//count sentence sum
		$sentence_sum = 0;
		//count match sentence number
		$match_pattern_num = 0;
		//$period_count = 0;
		$mergekey = 0;
		while($row =  mysql_fetch_array($clause_temp))
		{
			$temp_count = -1;
			$multi_sentences = 0; 
			//if the field have multi sentences, then the $multi_sentences will be 1 
			
			$Clause_array[$law_size]['context'] = $row['context'];
			//echo "\n".$Clause_array[$law_size]['context']."\n";
			$temp_count += substr_count($Clause_array[$law_size]['context'],"@");
			if($temp_count>1)
			{
				//$clause_cut_temp = array();
				$clause_cut = array();
				$cut_temp = 0; //clause_cut counter
				//explode @=。+換行
				$res = explode("@",$Clause_array[$law_size]['context']);
				//let the array's last [] pop out
				array_pop($res);
				//print_r($res);
				//如果是列點則須合併回來
				//echo "sentense number = ".count($res)."<br/>";
				for($count=0; $count<count($res); $count++)
				{
					// to check the end of the sentence contains : or not
					$pos = strpos($res[$count],"$");

					//"$"=>"全形："
					$space='\\$';
					$res[$count] = ereg_replace($space,'：',$res[$count]);
					//echo $res[$count];
					if($pos != false)
					{				
						$clause_cut[$cut_temp] = $res[$count]."。";
						$count++;
						$mergekey = itemornot(trim($res[$count]));			
							
						while(($mergekey==1))
						{
							$clause_cut[$cut_temp] .= $res[$count]."。";
							$count++;
							$mergekey = itemornot(trim($res[$count]));
							
						}
						//print_r($clause_cut[$cut_temp]);
						//echo "\nXD\n".$res[$count];
						$cut_temp++;
						//echo "testing here\n";
						$count--;
					}
					else if($pos === false)
					{
						$clause_cut[$cut_temp] = $res[$count]."。";
						$cut_temp++;
					}
				}
				$multi_sentences = 1;
				//print_r($clause_cut);//result
			}
			else
			{
				//還沒有加入分詞判斷前所使用
				//拿掉"本法所"開頭，後面可能要依據不同的law kind
				if(preg_match($head_pattern,$Clause_array[$law_size]['context'],$res))
				{
					$Clause_array[$law_size]['context'] = $res[1];
					//echo "\n".$Clause_array[$law_size]['context']."\n";
				}
				elseif(preg_match($head_pattern_2,$Clause_array[$law_size]['context'],$res))
				{
					$Clause_array[$law_size]['context'] = $res[1];
					//echo "\n".$Clause_array[$law_size]['context']."\n";
				}
				//沒有則視該 $Clause_array[$law_size]['context']為一完整句子

				//將結尾換成句號"@"=>"。"
				$space = "@";
				$Clause_array[$law_size]['context'] = ereg_replace($space,"。",$Clause_array[$law_size]['context']);
				
				//$multi_sentences = 0;			
				//echo $Clause_array[$law_size]['context']."\n";
				//result
			}
		
			if($multi_sentences == 0) //單一句子
			{
				$have_match = 0;
				for($count = 0; $count<$rule_size; $count++)
				{
					if((preg_match($rule[$count],$Clause_array[$law_size]['context']))&&($have_match!=1))
					{
						//echo "Match the rule=".$count."\n";
						//echo $Clause_array[$law_size]['context']."\n";
						$have_match = 1; //已經找到配對的pattern，則set為1
						$match_pattern_num++;
					}
				}
				$sentence_sum++;
			}
			else //有多個句子的array
			{
				for($array_count=0; $array_count<count($clause_cut); $array_count++)
				{
					$have_match = 0;
					for($count = 0; $count<$rule_size; $count++)
					{	
						if((preg_match($rule[$count],$clause_cut[$array_count]))&&($have_match!=1))
						{
							//echo "Match the rule=".$count."\n";
							//echo $clause_cut[$array_count]."\n";						
							$have_match = 1; //已經找到配對的pattern，則set為1
							$match_pattern_num++;
						}
					}
				}			
				$sentence_sum += count($clause_cut);			
			}
			//$period_count += $temp_count;	//計算句號個數
			$law_size++;
			//echo $multi_sentences."\t";
		}
		
		
		//echo "match pattern's sentence: ".$match_pattern_num."\n";
		//echo "sentence sum: ".$sentence_sum."\n";
		//echo "clause field number: ".$law_size."\n";
		//條文句子總數統計
		$field_number += $law_size;
		$sentence_number += $sentence_sum;
		$match_number += $match_pattern_num;
		$lawid_counter++;
	}		
	//echo "\n".$period_count."\n";
	//統計結果
	echo "法規數量: ".$lawid_counter."\n";
	echo "欄位總數: ".$field_number."\n";
	echo "句子總數: ".$sentence_number."\n";
	echo "Match pattern總數: ".$match_number."\n";
	
	
	
	
	
	
	
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
