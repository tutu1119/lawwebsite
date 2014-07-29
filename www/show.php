<?php
//header('refresh: 15;url="show.php"');
require_once("lib/Smarty.php");

//連線Mongo DB
$server = array('mongodb://lawuser:0000@localhost:27017',);
$options = array('connect' => true);
//try to connect
if (!class_exists('Mongo'))
{
  die("Mongo support required. Install mongo pecl extension with 'pecl install mongo; echo \"extension=mongo.so\" >> php.ini'");
}
try
{
  $mongo = new Mongo(getServer($server), $options);
}
catch (MongoConnectionException $ex)
{
  error_log($ex->getMessage());
  die("Failed to connect to MongoDB");
}
/**
 * Get the current MongoDB server.
 * @param mixed $server
 * @return string $server
 */
function getServer($server)
{
  if (is_array($server)) {
    return (isset($_COOKIE['mongo_server']) && isset($server[$_COOKIE['mongo_server']])) ? $server[$_COOKIE['mongo_server']] : $server[0];
  } else {
    return $server;
  }
}

//choose db&collection
$coll=$mongo->selectDB('cjkt')->selectCollection('join');
$res=$coll->find()->sort(array('_id' => 1));
$result = array();
$result = toResult($res);
//var_dump($result);
$tpl->assign('list_all',$result);

//Search
$show_notfind = 0;
$find_option =0;
$multi_search =0;
if(isset($_POST['find']))
{
	//echo $_POST['search']."XD";
	//echo $_POST['select_type'];
	$china_check = $_POST ["china_check"];
	$japan_check = $_POST ["japan_check"];
	$korea_check = $_POST ["korea_check"];
	$taiwan_check = $_POST ["taiwan_check"];
	$tpl->assign('china_check',$china_check);
	$tpl->assign('china_count',count($china_check));
	$tpl->assign('japan_check',$japan_check);
	$tpl->assign('japan_count',count($japan_check));
	$tpl->assign('korea_check',$korea_check);
	$tpl->assign('korea_count',count($korea_check));
	$tpl->assign('taiwan_check',$taiwan_check);
	$tpl->assign('taiwan_count',count($taiwan_check));
	/*var_dump($china_check);
	var_dump($japan_check);
	var_dump($korea_check);
	var_dump($taiwan_check);*/
	
	if(($china_check||$japan_check||$korea_check||$taiwan_check)!=null)
	{
		$find_option =1;		
	}
	$tpl->assign('find_option',$find_option);
	//$find_option =0;
	
	if(($_POST['search'] !=null) && ($_POST['select_type']!=null))
	{
		$search = trim($_POST['search']);
		$type = $_POST['select_type'];
		
		if($type == 'id')
		{
			if(preg_match('/(.*);(.*)/',$search))
			{
				//echo $search;
				$multi_arr = explode(";", $search);
				//var_dump($multi_arr);
				$multi_search =1;
			}
			else if(preg_match('/(.*)-(.*)/',$search))
			{
				$check_search = ereg_replace("-","",$search);
			}
			else
			{
				$check_search = $search; 
			}
			if($multi_search ==0)
			{
				if(is_numeric($check_search))
				{
					$query=array('_id' =>$search);
					$coll=$mongo->selectDB('cjkt')->selectCollection('join');
					$res=$coll->find($query);
					if($find_option==0)
					{
						$search_res = toResult($res);
					}
					else if($find_option!=0)
					{
						$search_res = toResult_option($res,$china_check,$japan_check,$korea_check,$taiwan_check);
					}
					
					//var_dump($search_res);
					if($search_res == null)
					{
						$show_notfind = 1;
					}
				}
				else
				{
					echo "<script> alert('Your input are not numbers, please recheck');location.href='show.php';</script>";
					$search_res = null;
					$tpl->assign('search',$_POST['search']);
				}			
			}
			else if($multi_search ==1)
			{	
				$multi_count=count($multi_arr);
				for($multi_temp=0; $multi_temp< $multi_count; $multi_temp++)
				{
					$check_search = ereg_replace("-","",$multi_arr[$multi_temp]);
					
					if(is_numeric($check_search))
					{
						$query=array('_id' =>$multi_arr[$multi_temp]);
						$coll=$mongo->selectDB('cjkt')->selectCollection('join');
						$res=$coll->find($query);
						if($find_option==0)
						{
							$search_temp = toResult($res);
							$search_res = array_merge((array)$search_res, (array)$search_temp);
						}
						else if($find_option!=0)
						{
							$search_temp = toResult_option($res,$china_check,$japan_check,$korea_check,$taiwan_check);
							//$search_res = array();
							$search_res = array_merge((array)$search_res, (array)$search_temp);
							//$search_res .= $search_temp;
							//$search_temp = $search_res;
						}
						
						//var_dump($search_res);
						if($search_res == null)
						{
							$show_notfind = 0; //1
						}
					}
					else
					{
						echo "<script> alert('Your input are not numbers, please recheck');location.href='show.php';</script>";
						$search_res = null;
						$tpl->assign('search',$_POST['search']);
					}
				}
			}
		}
		else if($type == 'english')
		{
			//檢查時先過濾空格
			$check_search = ereg_replace(" ","",$search);
			if(preg_match('/^([A-Za-z]+)$/',$check_search))
			{
				$regex = new MongoRegex("/".$search."/");
				$query=array('value.traditonalchinese_to_english' => $regex);	
				$res=$coll->find($query);
				if($find_option==0)
				{
					$search_res = toResult($res);
				}
				else if($find_option!=0)
				{
					$search_res = toResult_option($res,$china_check,$japan_check,$korea_check,$taiwan_check);
				}
				if($search_res == null)
				{
					$show_notfind = 1;
				}
				//$tpl->assign('list_all',$search_res);				
			}
			else
			{
				echo "<script> alert('Your input are not English, please recheck');location.href='show.php';</script>";
				$search_res = null;
				$tpl->assign('search',$_POST['search']);
			}
		}
		//檢查find結果
		if(($search_res != null)&&($show_notfind == 0))
		{
			$tpl->assign('list_all',$search_res);
		}
		else if(($search_res == null)&&($show_notfind == 1))
		{
			echo "<script> alert('Not find match item');location.href='show.php';</script>";
			//header("Location:show.php");
			$show_notfind = 0;
		}
		
	}
	else if($_POST['search'] ==null && (($_POST['id'] && $_POST['english']) == null))
	{
		echo "<script> alert('Please enter the search ID or keyword');location.href='show.php';</script>";
	}
	else if(($_POST['id'] && $_POST['english']) == null)
	{
		echo "<script> alert('Please select the search type');location.href='show.php';</script>";
		$tpl->assign('search',$_POST['search']);
	}
	

}
$tpl->display('show.tpl');

//toResult:將find回來的值to one dim array & store in result
function toResult($res)
{
	$result = array();
	$idx=0;
	foreach($res as $val)
	{
		$result[$idx]['original_ID'] = $val['_id'];

		$result[$idx]['japanese']=$val[value]['japanese'];
		$result[$idx]['japanese_statutory'] = $val[value]['japanese_statutory'];
		$result[$idx]['japanese_equivalent'] = $val[value]['japanese_equivalent'];
		$result[$idx]['japanese_equivalent_statutory'] = $val[value]['japanese_equivalent_statutory'];
		$result[$idx]['japanese_to_english']=$val[value]['japanese_to_english'];
		
		$result[$idx]['korean_to_chinese']=$val[value]['korean_to_chinese'];
		$result[$idx]['korean']=$val[value]['korean'];		
		$result[$idx]['korean_statutory'] = $val[value]['korean_statutory'];
		$result[$idx]['korean_equivalent'] = $val[value]['korean_equivalent'];
		$result[$idx]['korean_equivalent_statutory'] = $val[value]['korean_equivalent_statutory'];
		$result[$idx]['o_korean_to_english']=$val[value]['o_korean_to_english'];
		$result[$idx]['e_korean_to_english']=$val[value]['e_korean_to_english'];
		
		$result[$idx]['chinese_traditionalshape'] = $val[value]['chinese_traditionalshape'];
		$result[$idx]['chinese_statutory'] = $val[value]['chinese_statutory'];
		$result[$idx]['chinese_equivalent'] = $val[value]['chinese_equivalent'];
		$result[$idx]['chinese_equivalent_statutory'] = $val[value]['chinese_equivalent_statutory'];
		$result[$idx]['traditonalchinese_to_english']=$val[value]['traditonalchinese_to_english'];
		
		$result[$idx]['china'] = $val[value]['china'];
		$result[$idx]['china_statutory'] = $val[value]['china_statutory'];
		$result[$idx]['china_equivalent'] = $val[value]['china_equivalent'];
		$result[$idx]['china_equivalent_statutory'] = $val[value]['china_equivalent_statutory'];
		$result[$idx]['china_to_english'] = $val[value]['china_to_english'];
		$idx++;

	}
		//var_dump($result);
		//echo "\nXDDDDDDD!!!!!!!!!!!!!!\n";	
	//echo "\nXDDDDDDD!!!!!!!!!!!!!!\n";
	return $result;
}

function toResult_option($res,$china_check,$japan_check,$korea_check,$taiwan_check)
{
	$result = array();
	$idx=0;
	$temp=0;
	foreach($res as $val)
	{
		$result[$idx]['original_ID'] = $val['_id'];

		if($japan_check[0]=='all')
		{
			$result[$idx]['japanese']=$val[value]['japanese'];
			$result[$idx]['japanese_statutory'] = $val[value]['japanese_statutory'];
			$result[$idx]['japanese_equivalent'] = $val[value]['japanese_equivalent'];
			$result[$idx]['japanese_equivalent_statutory'] = $val[value]['japanese_equivalent_statutory'];
			$result[$idx]['japanese_to_english']=$val[value]['japanese_to_english'];
		}
		else
		{
			for($temp=0; $temp<=(count($japan_check));$temp++)
			{
				if($japan_check[$temp]==1)
				{
					$result[$idx]['japanese']=$val[value]['japanese'];
				}
				else if($japan_check[$temp]==2)
				{
					$result[$idx]['japanese_statutory'] = $val[value]['japanese_statutory'];
				}
				else if($japan_check[$temp]==3)
				{
					$result[$idx]['japanese_equivalent'] = $val[value]['japanese_equivalent'];
				}
				else if($japan_check[$temp]==4)
				{
					$result[$idx]['japanese_equivalent_statutory'] = $val[value]['japanese_equivalent_statutory'];
				}
				else if($japan_check[$temp]==5)
				{
					$result[$idx]['japanese_to_english']=$val[value]['japanese_to_english'];
				}				
			}
		} 

		if($korea_check[0]=='all')
		{
			$result[$idx]['korean_to_chinese']=$val[value]['korean_to_chinese'];
			$result[$idx]['korean']=$val[value]['korean'];		
			$result[$idx]['korean_statutory'] = $val[value]['korean_statutory'];
			$result[$idx]['korean_equivalent'] = $val[value]['korean_equivalent'];
			$result[$idx]['korean_equivalent_statutory'] = $val[value]['korean_equivalent_statutory'];
			$result[$idx]['o_korean_to_english']=$val[value]['o_korean_to_english'];
			$result[$idx]['e_korean_to_english']=$val[value]['e_korean_to_english'];
		}
		else
		{
			for($temp=0; $temp<=(count($korea_check));$temp++)
			{
				if($korea_check[$temp]==1)
				{
					$result[$idx]['korean_to_chinese']=$val[value]['korean_to_chinese'];			
				}
				else if($korea_check[$temp]==2)
				{
					$result[$idx]['korean']=$val[value]['korean'];
				}
				else if($korea_check[$temp]==3)
				{
					$result[$idx]['korean_statutory'] = $val[value]['korean_statutory'];
				}
				else if($korea_check[$temp]==4)
				{
					$result[$idx]['korean_equivalent'] = $val[value]['korean_equivalent'];
				}
				else if($korea_check[$temp]==5)
				{
					$result[$idx]['korean_equivalent_statutory'] = $val[value]['korean_equivalent_statutory'];
				}	
				else if($korea_check[$temp]==6)
				{
					$result[$idx]['o_korean_to_english']=$val[value]['o_korean_to_english'];
				}	
				else if($korea_check[$temp]==7)
				{
					$result[$idx]['e_korean_to_english']=$val[value]['e_korean_to_english'];	
				}					
			}
		} 
		
		if($taiwan_check[0]=='all')
		{
			$result[$idx]['chinese_traditionalshape'] = $val[value]['chinese_traditionalshape'];
			$result[$idx]['chinese_statutory'] = $val[value]['chinese_statutory'];
			$result[$idx]['chinese_equivalent'] = $val[value]['chinese_equivalent'];
			$result[$idx]['chinese_equivalent_statutory'] = $val[value]['chinese_equivalent_statutory'];
			$result[$idx]['traditonalchinese_to_english']=$val[value]['traditonalchinese_to_english'];
		}
		else
		{
			for($temp=0; $temp<=(count($taiwan_check));$temp++)
			{
				if($taiwan_check[$temp]==1)
				{
				$result[$idx]['chinese_traditionalshape'] = $val[value]['chinese_traditionalshape'];
				}
				else if($taiwan_check[$temp]==2)
				{
					$result[$idx]['chinese_statutory'] = $val[value]['chinese_statutory'];
				}
				else if($taiwan_check[$temp]==3)
				{
					$result[$idx]['chinese_equivalent'] = $val[value]['chinese_equivalent'];
				}
				else if($taiwan_check[$temp]==4)
				{
					$result[$idx]['chinese_equivalent_statutory'] = $val[value]['chinese_equivalent_statutory'];
				}
				else if($taiwan_check[$temp]==5)
				{
					$result[$idx]['traditonalchinese_to_english']=$val[value]['traditonalchinese_to_english'];
				}				
			}
		}
		
		if($china_check[0]=='all')
		{
			$result[$idx]['china'] = $val[value]['china'];
			$result[$idx]['china_statutory'] = $val[value]['china_statutory'];
			$result[$idx]['china_equivalent'] = $val[value]['china_equivalent'];
			$result[$idx]['china_equivalent_statutory'] = $val[value]['china_equivalent_statutory'];
			$result[$idx]['china_to_english'] = $val[value]['china_to_english'];
		}
		else
		{
			//echo (count($china_check)-1);
			for($temp=0; $temp<=(count($china_check)); $temp++)
			{
				
				if($china_check[$temp]==1)
				{
					$result[$idx]['china'] = $val[value]['china'];
				}
				else if($china_check[$temp]==2)
				{
					$result[$idx]['china_statutory'] = $val[value]['china_statutory'];
				}
				else if($china_check[$temp]==3)
				{
					$result[$idx]['china_equivalent'] = $val[value]['china_equivalent'];
				}
				else if($china_check[$temp]==4)
				{
					$result[$idx]['china_equivalent_statutory'] = $val[value]['china_equivalent_statutory'];
				}
				else if($china_check[$temp]==5)
				{
					$result[$idx]['china_to_english'] = $val[value]['china_to_english'];
				}				
			}
		}
		
		$idx++;
	}
	return $result;
}
?>