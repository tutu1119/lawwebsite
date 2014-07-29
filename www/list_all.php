<?php
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
$res=$coll->find();
$result = array();
$result = toResult($res);

$tpl->assign('list_all',$result);

//Search
$show_notfind = 0;
if(isset($_POST['find']))
{
	//echo $_POST['search']."XD";
	//echo $_POST['select_type'];
	if(($_POST['search'] !=null) && ($_POST['select_type']!=null))
	{
		$search = trim($_POST['search']);
		$type = $_POST['select_type'];
		
		if($type == 'id')
		{
			if(preg_match('/(.*)-(.*)/',$search))
			{
				$check_search = ereg_replace("-","",$search);
			}
			else
			{
				$check_search = $search; 
			}
			if(is_numeric($check_search))
			{
				$query=array('_id' =>$search);
				$coll=$mongo->selectDB('cjkt')->selectCollection('join');
				$res=$coll->find($query);				
				$search_res = toResult($res);
				//var_dump($search_res);
				if($search_res == null)
				{
					$show_notfind = 1;
				}
			}
			else
			{
				echo "<script> alert('Your input are not numbers, please recheck')</script>";
				$search_res = null;
				$tpl->assign('search',$_POST['search']);
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
				$search_res = toResult($res);
				if($search_res == null)
				{
					$show_notfind = 1;
				}
				//$tpl->assign('list_all',$search_res);				
			}
			else
			{
				echo "<script> alert('Your input are not English, please recheck')</script>";
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
			echo "<script> alert('Not find match item')</script>";
			$show_notfind = 0;
		}
		
	}
	else if($_POST['search'] ==null && (($_POST['id'] && $_POST['english']) == null))
	{
		echo "<script> alert('Please enter the search ID or keyword')</script>";
	}
	else if(($_POST['id'] && $_POST['english']) == null)
	{
		echo "<script> alert('Please select the search type')</script>";
		$tpl->assign('search',$_POST['search']);
	}
}
$tpl->display('list_all.tpl');

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
	return $result;
}
?>