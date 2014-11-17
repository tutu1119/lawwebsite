<?php
function cut_keyword($temp_rule,$law)
{	
	include "rule.php";
	
	switch ($temp_rule)
	{
		case $rule[0]:        //rule[0]="/(.*)，謂(.*)。/"   this case judge three type law
				$Detail_head = "/^稱(.*)，謂(.*)。/"; //判斷開頭是否有稱
				if(preg_match($Detail_head,$law))  
				{
					preg_match($Detail_head,$law,$match);					
					$or_boolean = strpos($match[2], $or);
					if($or_boolean !== false)  //law定義是否有重複 找:"或"
					{
						$define = explode( $or, $match[2]);
					}
					else
					{
						$define = $match[2];
					}
					$keyword = $match[1];
				}
				else
				{
					preg_match($temp_rule,$law,$match);
                    $keyword = $match[1];
					$define = $match[2];
				} 					
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[1]:       //$rule[1]="/(.*)，為(.*)。/" this case judge two type law
				$Detail_head = "/^稱(.*)，為(.*)。/"; //判斷開頭是否有稱
				if(preg_match($Detail_head,$law))
				{
					preg_match($Detail_head,$law,$match);
					$keyword = $match[1];
					$define = $match[2];
				}
				else                //[definition]，為*term。
				{
					preg_match($temp_rule,$law,$match);
                    $keyword = $match[2];
					$define = $match[1];
				}
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[2]:      //$rule[2]="/^稱(.*)，指(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$define = judge_conjunction($match[2]);
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[3]:      //$rule[3]="/^稱(.*)，係指(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$define = $match[2];
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[4]:      //$rule[4]="/^稱(.*)：(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$semicolon_boolean = strpos($match[2], $semicolon); //有沒有頓號
				if($semicolon_boolean !== false)
				{
					$context = explode($semicolon,$match[2]);
					$Detail_head = "/在(.*)為(.*)/";
					$t_count = 0;
					while($context[$t_count] != null)
					{
						if(preg_match($Detail_head,$context[$t_count]))
						{
							preg_match($Detail_head,$context[$t_count],$temp);
							array_shift($temp);
							$define[$t_count] = $temp;
							//var_dump($temp);
							$t_count++;
						}
						
					}
				}
				else
				{
					$define = $match[2];
					echo "定義沒做額外切割";
				}
				
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[5]:      //$rule[5]="/(.*)，視為(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[2];
				$define = judge_conjunction($match[1]);
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[6]:      //$rule[6]="/(.*)，以(.*)論。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[2];
				$define = $match[1];
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[7]:      //$rule[7]="/(.*)，稱為(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[2];
				$define = $match[1];
				/*echo 'keyword='.$keyword."\ndefine=";
        		var_dump($define);*/
				return array($keyword, $define);
				break;
				
		case $rule[8]:		//$rule[8]="/^本法用詞定義如下：(.*)/"
				preg_match($temp_rule,$law,$match);
				$item = cut_item($match[1]);   //逐項切割
				$keyword_define = array(); //array->array [0]:keyword [1]:define
				$Detail_rule = "/(.*)：指(.*)/";
				for($t_count=1; $t_count<=count($item);$t_count++)
				{
					preg_match($Detail_rule,$item[$t_count],$temp);
					array_shift($temp);
					$keyword_define[$t_count] = $temp;
				}
				//var_dump($keyword_define);
				return array($keyword_define);
				break;
		case $rule[9]:       //$rule[9]="/^本法所定(.*)，(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$define = cut_item($match[2]);   //逐項切割
				//echo 'keyword='.$keyword."\n";
				//var_dump($define);
				return array($keyword, $define);
				break;
		case $rule[10]:		//$rule[10]="/(.*)，分左列二種。(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];				
				$define = cut_item($match[2]);   //逐項切割
				/*echo 'keyword='.$keyword."\n";
				var_dump($define);*/
				return array($keyword, $define);
				break;
		case $rule[11]:		//$rule[11]="/本法所稱(.*)如左：(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$item = cut_item($match[2]);   //逐項切割
				
				$subkeyword_define = array(); //array->array [0]:keyword [1]:define
				$Detail_rule = "/(.*)：係指(.*)/";
				for($t_count=1; $t_count<=count($item);$t_count++)
				{
					preg_match($Detail_rule,$item[$t_count],$temp);
					array_shift($temp);
					$subkeyword_define[$t_count] = $temp;
				}		
				//echo 'keyword='.$keyword."\n";
				//var_dump($subkeyword_define);
				return array($keyword, $subkeyword_define);
				break;
		case $rule[12]:		//$rule[12]="/(.*)區分如下：(.*)。/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$item = cut_item($match[2]);   //逐項切割
				
				$subkeyword_define = array(); //array->array [0]:keyword [1]:define
				$Detail_rule = "/(.*)：以(.*)/";
				for($t_count=1; $t_count<=count($item);$t_count++)
				{
					preg_match($Detail_rule,$item[$t_count],$temp);
					array_shift($temp);
					$subkeyword_define[$t_count] = $temp;
				}		
				//echo 'keyword='.$keyword."\n";
				//var_dump($subkeyword_define);
				return array($keyword, $subkeyword_define);
        		break;
		case $rule[13]:		//$rule[13]="/(.*)以(.*)或(.*)/"
				preg_match($temp_rule,$law,$match);
				$keyword = $match[1];
				$context = $match[2];
				$or_boolean = strpos($match[2], $or); //or數不固定
				if($or_boolean !== false)  //law定義是否有重複 找:"或"
					{
						$define = explode( $or, $match[2]);
					}
				/*echo 'keyword='.$keyword;
				var_dump($define);*/
				return array($keyword, $define);
				break;
		case $rule[14]:		//$rule[14]="/本法用詞，定義如下：(.*)/"
				preg_match($temp_rule,$law,$match);
				$item = cut_item($match[1]);
				//var_dump($item);
				return $item;
				break;
		default:
				echo "Match 後沒有做到切割\n";
	}
}
function judge_conjunction($have_conj)
{
		include "rule.php";
		$comma_boolean = strpos($have_conj, $comma); //有沒有頓號
		$or_boolean = strpos($have_conj, $or); //有沒有"或"
		$and_boolean = strpos($have_conj, $and); //有沒有"及"
		
		if($comma_boolean !== false)
		{
			$define = explode($comma,$have_conj);
			$or_boolean = strpos(end($define), $or); //有沒有"或"
			$and_boolean = strpos(end($define), $and); //有沒有"及"
			if($or_boolean !== false && $and_boolean == false)
			{
				$temp = explode($or, end($define));
				array_pop($define); //最後一個覆蓋掉
				$define = array_merge($define, $temp);
			}
			else if($and_boolean !== false && $or_boolean == false)
			{
				$temp = explode($and, end($define));
				array_pop($define); //最後一個覆蓋掉
				$define = array_merge($define, $temp);
			}
			else //同時有or & and
			{
				$de_rule=array("/(.*)及(.*)或(.*)/","/(.*)或(.*)及(.*)/");
				for($d_count=0;$d_count<count($define);$d_count++)
				{
					for($i=0; $i<2; $i++)
					{
						if(preg_match($de_rule[$i],$define[$d_count]))
						{
							preg_match($de_rule[$i],$define[$d_count],$temp);							
							array_shift($temp);
							unset($define[$d_count]); //將切割的原文移除
							$define = array_merge($define, $temp);
						}
						
					}
					
				}
			}
			
		}
		else if($or_boolean !== false)
		{
			$define = explode($or, $have_conj);
			echo "0";
		}
		else if($and_boolean !== false)
		{
			$define = explode($and, $have_conj);
			echo "1";
		}
		
		return $define;
}
function cut_item($context) //逐項切割
{
	include "rule.php";	
	$max = 0;
	$i=1;
	//判斷總共有幾項
	$max_boolean = strpos($context,$list_number[$i]);				
	while($max_boolean !== false)
	{
		$max++;						
		$i++;
		$max_boolean = strpos($context,$list_number[$i]);					
	}
	//倒數著切割
	$define = array();
	for($i=$max;$i>0;$i--) 
	{				
		$context = explode( $list_number[$i], $context);
		$define[$i] = array_pop($context); //提出最後一項
		$context=implode($context); //轉回string
		if($i==1) //檢查"一"項前是否還有其他定義
		{
			if($context!=null)
			{
				$define[0] = $context;
			}
				
		}
	}
	return $define;
}				
?>
