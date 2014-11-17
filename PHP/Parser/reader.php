<?php
$ch = curl_init();
$options = array(CURLOPT_URL =>'http://law.moj.gov.tw/LawClass/LawClassListN.aspx',
CURLOPT_HEADER => false,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_USERAGENT => "Google Bot",
CURLOPT_FOLLOWLOCATION => true
);
curl_setopt_array($ch, $options);

//$fp = fopen('123.txt','w');
$output = curl_exec($ch);
curl_close($ch);

$pieces = explode("</table>",$output);
$pieces_ul = explode("<ul",$pieces[2]);
//$echo $output;
//echo count($pieces_ul)."\n";
$temp =0;
//foreach($pieces_ul as $item)
//{
	$pieces_li = explode("</li>", $item);
	print_r($pieces_li);
	$temp +=count($pieces_li);	
	//fwrite($fp,"--------------------------------------\n");
	//fwrite($fp, $item);
//}
echo $temp."\n";
//fclose($fp);
?>
