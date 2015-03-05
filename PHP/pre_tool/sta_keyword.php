<?php
//$path = "../clean_lawBase/";

//readdir
$path = "../clean_data/";
$filename_arr = glob($path.'*.txt',GLOB_BRACE); //抓取資料夾內列表
foreach ($filename_arr as &$value) 
{
	$value = trim(str_replace ($path,"",$value)); //切割檔名
}
//echo  count($filename_arr);

$total_1 = $total_2 = $total_3 = $total_4 = $total_5 =0;
//1:如下 2:下列 3:如左 4.左列
for($lcount=0; $lcount<count($filename_arr);$lcount++)
{
	$temp = file_get_contents($path.$filename_arr[$lcount]); //一次讀入所有內容
	$total_1 += substr_count($temp,"有下列情形之一");
	$total_2 += substr_count($temp,"下列");
	$total_3 += substr_count($temp,"如左");
	$total_4 += substr_count($temp,"左列");

	echo $filename_arr[$lcount];
	echo "統計字\n 如下:".$total_1."\t下列:".$total_2."\t如左:".$total_3."\t左列:".$total_4."\n";
}
echo "統計字\n 如下:".$total_1."\t下列:".$total_2."\t如左:".$total_3."\t左列:".$total_4."\n" ;


?>
