<?php
//將lawBase_clean的全部檔案轉成csv->lawBase_csv
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
	$list_keyword = array(1 =>"/(.*)如左(.*)/",2 =>"/(.*)左列(.*)/",3 =>"/(.*)下列(.*)/",4 =>"/(.*)如下(.*)/");

	//readdir
$path = "../lawBase_clean/";
$filename_arr = glob($path.'*.txt',GLOB_BRACE); //抓取資料夾內列表
foreach ($filename_arr as &$value) 
{
	$value = trim(str_replace ($path,"",$value)); //切割檔名
}

//readcontext
for($lcount=0; $lcount<count($filename_arr);$lcount++)
{
	$fptr = @fopen($path.$filename_arr[$lcount], "r");
	$fwrite = @fopen("../lawBase_csv/".$filename_arr[$lcount], "w");
	$regular_end = "/(.*)：$/";

	if ($fptr)
	{		
		while (!feof($fptr))
		{
			//*
			$temp = fgets($fptr);
			jump:
			if(preg_match($regular_end,$temp))
			{
				$output = $temp;
				$temp = fgets($fptr); //抓下一行
				$list_num = 1;
				while(preg_match($list_number[$list_num],$temp))
				{
					$output =$output.$temp;
					$list_num++;
					$temp = fgets($fptr);
				}
				$output = str_replace("\n","",$output);
				$output .=",\n";
				echo $output."\n";
				fwrite($fwrite,$output);
				if($temp != null)
				{
					goto jump;
				}
				
			}	
			else
			{
				$output =str_replace("\n",",\n",$temp);
				echo $output."\n";
				fwrite($fwrite,$output);
			}
		}
	}
	fclose($fptr);
	fclose($fwrite);
}


?>