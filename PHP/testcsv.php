<?php
//將clean_data檔案轉為csv格式

$path = "../clean_data/";
if(is_dir($path))
{
	$filename_arr = glob($path.'*.txt',GLOB_BRACE);
	foreach ($filename_arr as &$value) 
	{
		$value = trim(str_replace ($path,"",$value)); //切割檔名
	}
	//echo  count($filename_arr);
	//var_dump($filename_arr);
}
for($lcount=0; $lcount<count($filename_arr);$lcount++)
{
	$fptr = fopen($path.$filename_arr[$lcount], "r");
	$fwrite = fopen("../csv_data/".$filename_arr[$lcount], "w");
		if ($fptr)
		{
			//fgets為每次讀取一列文字
			$temp = fgets($fptr); //1
			$getnext = fgets($fptr);  //2
			while (!feof($fptr))
			{
				//echo $temp;
				//echo $getnext;
				
				$mergekey = itemornot($getnext);
				//echo $mergekey."\n";
				
				while($mergekey==1)
				{
					$temp = $temp.$getnext; //merge			
					$getnext = fgets($fptr);  //3
					$mergekey = itemornot($getnext);
				}
				
				$temp = str_replace("\n","",$temp);
				$temp .=",\n";
				echo $temp;
				fwrite($fwrite,$temp);
				$temp = $getnext; //2
				$getnext = fgets($fptr);  //3

				//echo "-------------------------------\n";
			}
			$temp = str_replace("\n","",$temp);
			$temp .=",\n";
			echo $temp;
			fwrite($fwrite,$temp);
		}
		fclose($fptr);
		fclose($fwrite);
}

	
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
	$res = 0;
	foreach($list_number as $list_item)
	{
		if(preg_match($list_item,$getnext))
		{
			$res = 1; //是子項目則變數為1
		}
	}
	return $res; 
}
?>