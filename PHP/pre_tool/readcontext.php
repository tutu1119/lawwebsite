<?php
//將lawBase的全部檔案去除不要的開頭以及符號->clean_Base+

//readdir
$path = "../lawBase/";
$filename_arr = glob($path.'*.txt',GLOB_BRACE); //抓取資料夾內列表
foreach ($filename_arr as &$value) 
{
	$value = trim(str_replace ($path,"",$value)); //切割檔名
}
//echo  count($filename_arr);

//readcontext
for($lcount=0; $lcount<count($filename_arr);$lcount++)
{
	$filter_char = array('*','[',']',',');  //需要濾掉的字元
	$fptr = @fopen($path.$filename_arr[$lcount], "r");
	$fwrite = @fopen("../clean_lawBase/".$filename_arr[$lcount], "w");
	if ($fptr)
	{		
		$a=1;
		  while (!feof($fptr))
		  {
				//fgets為每次讀取一列文字
				$temp = fgets($fptr);				
				$context = explode($filename_arr[$lcount],$temp);			
				foreach($filter_char as $v)
				{
					$context = str_replace($v,"",$context);
				}
				$context = $context[1];
				
				
				$context = str_replace(" ","",$context);
				
							
				$cut_head = "/^第".$a."條(.*)/"; //過濾開頭第a項
				//echo $cut_head;
				if(preg_match($cut_head,$context))
				{
					preg_match($cut_head,$context,$out);
					$a++;
					$out[1] = preg_replace('/[\n\r\t]/','', $out[1]);
					//echo "\n1".$out[1];
					fwrite($fwrite,"\n".$out[1]);
				}
				else
				{
					$context = preg_replace('/[\n\r\t]/','',$context);
					//echo "\n2".$context;
					fwrite($fwrite,"\n".$context);
				}		
		  }
	}
	fclose($fptr);
	fclose($fwrite);
}


?>
