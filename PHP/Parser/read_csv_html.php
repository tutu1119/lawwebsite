<?php
$file = fopen("全國法規資料庫id.csv", "r");
$id_array = array();
$layer_0 = array();
$id_count=0;
while(!feof($file))
{
	$id_array[] = fgetcsv($file);
}
foreach($id_array as $key=>$value)
{

	if($id_array[$key][0]!=null)
	{
		//echo $key." = ".$id_array[$key][0]."\n";
		$layer_0[] = $key;
	}
	
	if($id_array[$key][7]!=null && $id_array[$key][7]!="NULL")
	{
		echo $id_array[$key][7]."\t";
		$id_count++;
		//sleep(5);
	}
	if($key==2)
	{
		 print_r($id_array[$key]);
	}
}
echo "\nID= ".$id_count;
echo "\nid0=".$temp[1];
for($count=1; $count<count($layer_0); $count++)
{
	//echo $layer_1[$count]."\n";
	$now = 1+($layer_0[$count]);
	$next = $layer_0[++$count];
	echo "\nHi\t".$now;
	echo "Hello".$next;

		$boo_lay1=0;
		$boo_lay2=0;

	for($L_count=$now; $L_count<$next;  $L_count++)
	{
		//have layer 1
		if($id_array[$L_count][2]!=null)
		{
			$boo_lay1++;
		}
		//have layer 2 	
		if($id_array[$L_count][4]!=null)
		{
			$boo_lay2++;
		}
	}
		echo "\n1: ".$boo_lay1;
		echo "\t2:".$boo_lay2;

	if($boo_lay1==0 && $boo_lay2==0)
	{
		for($L_count=$now; $L_count<$next;  $L_count++)
		{
			//echo $id_array[$L_count][6]."\n"; 
		}
	}
/*	else if($boo_lay1!=0 && $boo_lay2==0)
	{
			//echo $boo_lay1;
			print_r($id_array[$L_count]);
		}
*/
//	}

	$count--;
}
//print_r($layer_0);
//print_r($id_array[0]);
echo count($id_array)."\n";
fclose($file);
?>
