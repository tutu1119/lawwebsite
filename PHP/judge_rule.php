<?php
	include "cut_keyword.php";
	include "rule.php";
	
	mb_internal_encoding('utf-8');
	$in_filename = "law.txt";
	$out_filename = "result.csv";
	$l_file = fopen($in_filename,"r");
	$l_result = fopen($out_filename, "w");
	$count = 0;
	$law = array();
	$filter_char = array('*','[',']');  //需要濾掉的字元
	
	while(!feof($l_file))
	{
		$law[$count] = fgetcsv($l_file);
		$law[$count] = implode((array)$law[$count]);
		foreach($filter_char as $v)//濾掉字元
		{
			  $law[$count] = str_replace($v,"",$law[$count]); 
		}
		$count++;	
	}
	$law_size = $count ;
	$count = 0 ;
	//echo $law_size."\t".$count."\n";
	
	$rule_size = count($rule) ; 
	//echo $rule_size."\t".$count."\n";	
	for($i = 0; $i<$law_size; $i++)
	{
		$flag = 0;
		for($j = 0; $j<$rule_size; $j++)
		{	
			if(preg_match($rule[$j],$law[$i]))
			{
				//echo "Match\n";
				$result = cut_keyword($rule[$j],$law[$i]);
				//$a++;
				echo "第".$i."條law\n";
				echo "rulenum".$j."\t";
				echo $rule[$j]."\t";
				echo $law[$i]."\n";
				fputs($l_result, $rule[$j]."|".$law[$i].",\n");
				$flag= 1 ;
				//var_dump($result);
				
				break; 	
			}

		}
		if($flag == 0)
			{
				echo "No match\n";
				fputs($l_result, "No match"."|".$law[$i].",\n");
			}
	}

	fclose($l_file);
	fclose($l_result);
?>
