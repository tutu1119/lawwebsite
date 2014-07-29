<?php
require_once("lib/Smarty.php");
//selected id value
$id=$_GET['id'];

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
$query=array('original_ID' => $id);
//taiwan
$coll=$mongo->selectDB('cjkt')->selectCollection('taiwan');
$res=$coll->find($query);
foreach($res as $val)
{
	$taiwan['original_ID']=$val['original_ID'];
	$taiwan['chinese_traditionalshape']=$val['chinese_traditionalshape'];
	$taiwan['chinese_statutory']=$val['chinese_statutory'];
	$taiwan['chinese_equivalent']=$val['chinese_equivalent'];
	$taiwan['chinese_equivalent_statutory']=$val['chinese_equivalent_statutory'];
	$taiwan['verb_or_noun']=$val['verb_or_noun'];
	$taiwan['overlapped']=$val['overlapped'];
	$taiwan['compound']=$val['compound'];	
	$taiwan['4type']=$val['4type'];
	$taiwan['existing_or_old_law']=$val['existing_or_old_law'];
	$taiwan['source']=$val['source'];
	$taiwan['comment']=$val['comment'];
	$taiwan['traditonalchinese_to_english'] = $val['traditonalchinese_to_english'];
}
$tpl->assign('taiwan',$taiwan);

	//判斷資料是否為多筆合一並切開
	//目前沒有判斷Existing law/Old law
	$res_count =array();
	//1
	$res_chinese = cut_semicolon($taiwan['chinese_traditionalshape']);
	$res_count[1] = count($res_chinese);
	if($res_count[1]!=0)
	{
		$tpl->assign('res_chinese',$res_chinese);
	}
	//2 equivalent
	$res_equal = cut_semicolon($taiwan['chinese_equivalent']);
	$res_count[2] = count($res_equal);
	if($res_count[2]!=0)
	{
		$tpl->assign('res_equal',$res_equal);
	}
	//3
	$res_over = cut_semicolon($taiwan['overlapped']);
	$res_count[3] = count($res_over);
	if($res_count[3]!=0)
	{
		$tpl->assign('res_over',$res_over);
	}
	//4
	$res_compound = cut_semicolon($taiwan['compound']);
	$res_count[4] = count($res_compound);
	if($res_count[4]!=0)
	{
		$tpl->assign('res_compound',$res_compound);
	}
	//5
	/*$res_type = cut_semicolon($taiwan['4type']);
	$res_count[5] = count($res_type);
	if($res_count[5]!=0)
	{
		$tpl->assign('res_type',$res_type);
	}*/
	//6
	$res_source = cut_semicolon($taiwan['source']);
	$res_count[6] = count($res_source);
	if($res_count[6]!=0)
	{
		$tpl->assign('res_source',$res_source);
	}
	//7
	$res_comment= cut_semicolon($taiwan['comment']);
	$res_count[7] = count($res_comment);
	if($res_count[7]!=0)
	{
		$tpl->assign('res_comment',$res_comment);
	}
	//8
	$res_toenglish = cut_semicolon($taiwan['traditonalchinese_to_english']);
	$res_count[8] = count($res_toenglish);
	if($res_count[8]!=0)
	{
		$tpl->assign('res_toenglish',$res_toenglish);
	}
	//var_dump($res_count);
	$tpl->assign('res_count',$res_count);

	//判斷Verb or Noun
	if(preg_match("/(.*);(.*)/",$taiwan['verb_or_noun']))
	{
		$show_vorn = explode(';',$taiwan['verb_or_noun']);
		$count_vorn = count($show_vorn); //$count_vorn=2
		//var_dump($show_vorn);
		//var_dump($count_vorn);
	}
	else
	{
		if($taiwan['verb_or_noun']!=null)
		{
			$show_vorn = $taiwan['verb_or_noun'];
			$count_vorn=1;
		}
		else
		{
			$count_vorn=0;
		}		
	}
	$tpl->assign('show_vorn',$show_vorn);
	$tpl->assign('count_vorn',$count_vorn);
	
	//TIFS 判斷4_type
	//$TIFS_string = 'T;I;S';
	$TIFS_find   = array("T","I","F","S");
	$TIFS_res   = array();
	for($tifs_num = 0; $tifs_num<4; $tifs_num++)
	{
		$pos = strpos($taiwan['4type'], $TIFS_find[$tifs_num]);
		if ($pos === false) {
			$TIFS_res[$tifs_num] = "0";
			/*echo $TIFS_res[$tifs_num];
			echo "The string '$TIFS_find[0]' was not found in the string '$TIFS_string'";*/
		} 
		else 
		{
			$TIFS_res[$tifs_num] = $TIFS_find[$tifs_num];
			/*echo $TIFS_res[$tifs_num]."!!!!!";
			echo "The string '$TIFS_find[0]' was found in the string '$TIFS_string'";
			echo " and exists at position $pos";*/
		}	
	}
	//var_dump($TIFS_res);
	$tpl->assign('TIFS_res',$TIFS_res);
	//var_dump($taiwan);
	//value $res_count to js
	include 'buttonjs.php';   //Edit時可動態增加input text
//china
$coll=$mongo->selectDB('cjkt')->selectCollection('china');
$res=$coll->find($query);
foreach($res as $val)
{
	$china['china']=$val['china'];
	$china['china_statutory']=$val['china_statutory'];
	$china['china_equivalent']=$val['china_equivalent'];
	$china['china_equivalent_statutory']=$val['china_equivalent_statutory'];
	$china['china_to_english']=$val['china_to_english'];
	$china['comment']=$val['comment'];
}
$tpl->assign('china',$china);
//var_dump($china);



//japan
$coll=$mongo->selectDB('cjkt')->selectCollection('japan');
$res=$coll->find($query);
foreach($res as $val)
{
	$japan['japanese']=$val['japanese'];
	$japan['japanese_statutory']=$val['japanese_statutory'];
	$japan['japanese_equivalent']=$val['japanese_equivalent'];
	$japan['japanese_equivalent_statutory']=$val['japanese_equivalent_statutory'];
	$japan['japanese_to_english']=$val['japanese_to_english'];
	$japan['comment']=$val['comment'];
}
$tpl->assign('japan',$japan);
//var_dump($japan);

//korea
$coll=$mongo->selectDB('cjkt')->selectCollection('korea');
$res=$coll->find($query);
foreach($res as $val)
{
	$korea['korean']=$val['korean'];
	$korea['korean_to_chinese']=$val['korean_to_chinese'];
	$korea['korean_statutory'] = $val['korean_statutory'];
	$korea['korean_equivalent'] = $val['korean_equivalent'];
	$korea['korean_equivalent_statutory'] = $val['korean_equivalent_statutory'];
	$korea['o_korean_to_english']=$val['o_korean_to_english'];
	$korea['e_korean_to_english']=$val['e_korean_to_english'];
	$korea['comment']=$val['comment'];
}
$tpl->assign('korea',$korea);


if(isset($_POST['submit']))
{
	$id = $_POST['id'];
	var_dump($_POST ['type_group']);
	$taiwan = merge_string('chinese_traditionalshape_');
	$statutory =  $_POST['chinese_statutory'];
	$equivalent = merge_string('chinese_equivalent_');
	$equivalent_statutory = $_POST['chinese_equivalent_statutory'];
	$overlapped = merge_string('overlapped_');
	$compound =  merge_string('compound_');
	$verb_or_noun = implode (";", $_POST ['vorn']);
	$type=  implode (";", $_POST ['type_group']);
	$existing_or_old_law = $_POST['existing_or_old_law'];
	$source = merge_string('source_');
	$comment = merge_string('comment_');
	$to_english = merge_string('traditonalchinese_to_english_');
	//hidden
	$china =$_POST['china'];
	$china_statutory =$_POST['china_statutory'];
	$china_equivalent =$_POST['china_equivalent'];
	$china_equivalent_statutory =$_POST['china_equivalent_statutory'];
	$china_to_english =$_POST['china_to_english'];
	
	$japanese =$_POST['japanese'];
	$japanese_statutory =$_POST['japanese_statutory'];
	$japanese_equivalent =$_POST['japanese_equivalent'];
	$japanese_equivalent_statutory =$_POST['japanese_equivalent_statutory'];
	$japanese_to_english =$_POST['japanese_to_english'];
	
	$korean =$_POST['korean'];	
	$korean_to_chinese =$_POST['korean_to_chinese'];
	$korean_statutory =$_POST['korean_statutory'];
	$korean_equivalent =$_POST['korean_equivalent'];
	$korean_equivalent_statutory =$_POST['korean_equivalent_statutory'];
	$o_korean_to_english =$_POST['o_korean_to_english'];
	$e_korean_to_english =$_POST['e_korean_to_english'];
	//update taiwan
	$coll=$mongo->selectDB('cjkt')->selectCollection('taiwan');
	$criteria = array("original_ID"=>$id);
	$data = array('$set'=>array("chinese_traditionalshape" => $taiwan,
								"chinese_statutory" => $statutory,
								'chinese_equivalent' =>$equivalent,
								'chinese_equivalent_statutory' =>$equivalent_statutory,
								'overlapped' =>$overlapped,
								'compound' =>$compound,
								'verb_or_noun'=>$verb_or_noun,
								'4type'=>$type,
								'existing_or_old_law'=>$existing_or_old_law,
								'source'=>$source,
								'comment'=>$comment,
								'traditonalchinese_to_english'=>$to_english								
								)
				);
	$options = array("upsert"=>true,"multiple"=>true);
	$res = $coll->update($criteria, $data, $options);
	//var_dump($res);
	$coll=$mongo->selectDB('cjkt')->selectCollection('join');
	//update join
	$criteria = array("_id"=>$id);
	$data = array('$set'=>array("value"=>
								array(
								'japanese'=>$japanese,
								'japanese_statutory'=>$japanese_statutory,
								'japanese_equivalent'=>$japanese_equivalent,
								'japanese_equivalent_statutory'=>$japanese_equivalent_statutory,
								'japanese_to_english'=>$japanese_to_english,
								'korean'=>$korean,
								'korean_to_chinese'=>$korean_to_chinese,
								'korean_statutory'=>$korean_statutory,
								'korean_equivalent'=>$korean_equivalent,
								'korean_equivalent_statutory'=>$korean_equivalent_statutory,
								'o_korean_to_english'=>$o_korean_to_english,
								'e_korean_to_english'=>$e_korean_to_english,
								'china'=>$china,
								'china_statutory'=>$china_statutory,
								'china_equivalent'=>$china_equivalent,
								'china_equivalent_statutory'=>$china_equivalent_statutory,
								'china_to_english'=>$china_to_english,
								'original_ID'=>$id,
								'chinese_traditionalshape' => $taiwan,
								'chinese_statutory' => $statutory,
								'chinese_equivalent' =>$equivalent,
								'chinese_equivalent_statutory' =>$equivalent_statutory,
								'traditonalchinese_to_english'=>$to_english								
								)								
							)
				);
	$res = $coll->update($criteria, $data, $options);
	//var_dump($res);
	header("Location:show_detail.php?id=$id");
}
$tpl->display('show_detail.tpl');

function cut_semicolon($temp)
{
	if(preg_match("/(.*);(.*)/",$temp))
	{
		$cut_arr = explode(';',$temp);
		//var_dump($cut_arr);
	}
	return $cut_arr;
}
function merge_string($fieldname)
{
	$temp_count=1;
	
	while(isset($_POST[$fieldname.$temp_count])==true)
	{
		if($_POST[$fieldname.$temp_count]!=null)
		{
			//var_dump($_POST[$fieldname.$temp_count]);
			$combine.=$_POST[$fieldname.$temp_count].';';
		}
		
		$temp_count++;
	}
	$combine = rtrim($combine, ';');
	//var_dump($combine);
	return $combine;
}

?>