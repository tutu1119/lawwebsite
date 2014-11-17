<?php
	$pattern_book ="/第(.|..|...)編(.*)/"; //3
	$pattern_kind ="/第(.|..|...)款(.*)/";//3
	$pattern_chapter ="/第(.|..|...)章(.*)/";//1
	$pattern_slot ="/第(.|..|...)節(.*)/";//2
	$pattern_text ="/第(\d\d\d\d|\d\d\d\d-\d|\d\d\d|\d\d|\d|\d-\d|\d\d-\d|\d\d-\d\d|\d\d\d-\d|\d\d\d-\d\d)條(.*)/";//0
	
	// link to database
	$link = mysql_connect('localhost', 'root', 'password');
	if (!$link) {
    	die('Could not connect: ' . mysql_error());
	}
	echo "Connected successfully\n";
	$db_selected = mysql_select_db('law_base', $link);
	if (!$db_selected) 
	{
    	die ("Can\'t usefoo : " . mysql_error());
	}
	mysql_query("SET NAMES 'utf8'");
	echo "switch to db successfully\n";
	
	//依類別新增
	$Law_array = array();
	$sql="SELECT * FROM text_dir WHERE  kind =0";
	$result = mysql_query($sql);
	$law_size = 0;
	while($row = mysql_fetch_array($result))
	{
		$Law_array[$law_size]['id'] = $row['lawtext_id'];
		$Law_array[$law_size]['name'] = $row['lawtext_name'];
		$law_size++;
	}
	//echo $law_size."\n";
	//$law_count= 184;
	for($law_count=0; $law_count<$law_size; $law_count++)
	//for($law_count=0; $law_count<1; $law_count++)
	{
		$ch = curl_init();
		$options = array(CURLOPT_URL =>'http://law.moj.gov.tw/LawClass/LawAll.aspx?PCode='.$Law_array[$law_count]['id'] ,
		CURLOPT_HEADER => false,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_USERAGENT => "Google Bot",
		CURLOPT_FOLLOWLOCATION => true
		);
		curl_setopt_array($ch, $options);
		$output = curl_exec($ch);
		curl_close($ch);

		$temp = explode("TableLawAll",$output);
		$cut_context = explode("</table>",$temp[1]);
		$temp_each_law = explode("</tr>",$cut_context[0]);
		//echo $cut_context[0];
		$count_num =count($temp_each_law);//此篇法律下的條文個數
		//echo $count_num;
		//新增table
		mysql_query("CREATE TABLE ".$Law_array[$law_count]['id']." (is_chapter int( 1 ) NULL ,num char( 15 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,context text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL) ");
		echo  "Your table has been created"; 
		
		for($count=0; $count<$count_num; $count++)
		{
			if($temp_each_law[$count] != null)
			{
				//echo $temp_each_law[$count]."\n";
				$temp_each_law[$count] = strip_tags($temp_each_law[$count],"");//過濾html語法
				//echo $temp_each_law[$count]."\n";
		
				//過濾符號 空格
				$temp_each_law[$count] = ereg_replace("\"","",$temp_each_law[$count]);
				$temp_each_law[$count] = ereg_replace(">","",$temp_each_law[$count]);
				$temp_each_law[$count] = ereg_replace("'","",$temp_each_law[$count]);
				$temp_each_law[$count] = ereg_replace("&nbsp;","",$temp_each_law[$count]);
			
				$space = "\r";
				$temp_each_law[$count] = ereg_replace($space,"#",$temp_each_law[$count]);

				$space = "\n";
				$temp_each_law[$count] = ereg_replace($space,"%",$temp_each_law[$count]);
		
				$space = "\t";
				$temp_each_law[$count] = ereg_replace($space,"",$temp_each_law[$count]);
			
				$space = " ";
				$temp_each_law[$count] = ereg_replace($space,"",$temp_each_law[$count]);
			
	
				//判斷"。+換行"=>"@"
				$space = "。#%";
				$temp_each_law[$count] = ereg_replace($space,"@",$temp_each_law[$count]);
                //判斷"：+換行"=>"$"
                $space = "：#%";
                $temp_each_law[$count] = ereg_replace($space,"$",$temp_each_law[$count]);
				//濾掉不要的換行跟空格
                $space = "#";
                $temp_each_law[$count] = ereg_replace($space,"",$temp_each_law[$count]);
                $space = "%";
                $temp_each_law[$count] = ereg_replace($space,"",$temp_each_law[$count]);


				//ho $temp_each_law[$count]."\n";
				$res = array();
				
				if($temp_each_law[$count]!=null)
				{	
					if(preg_match($pattern_text,$temp_each_law[$count])) //條
					{
						preg_match($pattern_text,$temp_each_law[$count],$res);
						//print_r($res);
						$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (NULL,'第".$res[1]."條','".$res[2]."');";
					}
					elseif(preg_match($pattern_chapter,$temp_each_law[$count])) //章
					{
						preg_match($pattern_chapter,$temp_each_law[$count],$res);
						//print_r($res);
						$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (1,'第".$res[1]."章','".$res[2]."');";
						//echo $sql;
					}
					elseif(preg_match($pattern_book,$temp_each_law[$count])) //編
					{
						preg_match($pattern_book,$temp_each_law[$count],$res);
						$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (3,'第".$res[1]."編','".$res[2]."');";
					}
					elseif(preg_match($pattern_slot,$temp_each_law[$count])) //節
					{
						preg_match($pattern_slot,$temp_each_law[$count],$res);
						$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (2,'第".$res[1]."節','".$res[2]."');";
						//echo $temp_each_law[$count]."\n";
					}
					elseif(preg_match($pattern_kind,$temp_each_law[$count])) //款
					{
						preg_match($pattern_kind,$temp_each_law[$count],$res);
						$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (3,'第".$res[1]."款','".$res[2]."');";
					}
					else //處理例外判斷
					{
						//echo "case out!!!!!!!\n";
						//echo $temp_each_law[$count]."\n";
						if(strpos ($temp_each_law[$count], "章"))
						{
							$res = explode("章",$temp_each_law[$count]);
							$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (1,'".$res[0]."章','".$res[1]."');";
						}
						elseif(strpos ($temp_each_law[$count], "目"))
						{
							$res = explode("目",$temp_each_law[$count]);
							$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (1,'".$res[0]."目','".$res[1]."');";
						}
						elseif(strpos ($temp_each_law[$count], "節"))
						{
							$res = explode("節",$temp_each_law[$count]);
							$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (1,'".$res[0]."節','".$res[1]."');";
						}
						else
						{
							echo "怎麼還有\n";
							echo $temp_each_law[$count]."\n";
							//$sql="INSERT INTO ".$Law_array[$law_count]['id']." (is_chapter,num,context) VALUES (-1,'".$res[1].",'".$temp_each_law[$count]."');";
						}
												
					}
				}
				mysql_query($sql) or die('error');
			}
		}
		echo "Database: num=".$law_count." id=".$Law_array[$law_count]['id']." add finish\n";
	}	
?>
