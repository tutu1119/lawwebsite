<html>
<head>
<title>jQuery add / remove textbox example</title>
 
<script type="text/javascript" src="interface/templates/js/jquery-1.3.2.min.js"></script>
 
<style type="text/css">
	div{
		padding:8px;
	}
</style>
 
</head>
 
<body>
 

 

</head><body>

<div id='TextBoxesGroup'>
	<div id="TextBoxDiv1">
		<label>1.	field name: </label><input type='textbox' id='textbox1' ><label>Type: </label><input type='textbox' id='type1' >
	</div>
</div>

<div id='TextBoxesGroup1'>
	<div id="TextBoxDiv1">
		<label>1.	field name: </label><input type='textbox' id='textbox1' ><label>Type: </label><input type='textbox' id='type1' >
	</div>
</div>
	<form name='form_content' method='post' action='hw2.php' >
		<input type='button' value='+' id='addButton' onclick="Add('hi');">
		<input type='button' value='Add' id='addButton' onclick="Add1('XD');">
		<input type='button' value='Remove Field name' id='removeButton'>
		<input type='hidden' id='getvalue' name='field_info'>
		<input type='button' value='儲存' name='save' id='getButtonValue'>
		<input type='submit' value='show' name='send' id='send'>
		
	</form>
	
	<?php 
	 $he=15;
	 echo $he;
	//echo "hello";
		if(isset($_POST['send']))
		{
			$test=$_POST['send'];
			$field_info=$_POST['field_info'];
			//echo $field_info;
			
			$file_db="mydb.txt";
			if (($fd = fopen($file_db, "a+")) !== false) { 
			  fwrite($fd,$field_info);   
			  fclose($fd); 
			}
			
			//---show_field---//
			
			
			
			$filename = "test";
			$str = "";
			//判斷是否有該檔案
			if(file_exists($file_db)){
				$file = fopen($file_db, "r");
				if($file != NULL){
					//當檔案未執行到最後一筆，迴圈繼續執行(fgets一次抓一行)
					while (!feof($file)) {
						$str .= fgets($file);
					}
					fclose($file);
				}
			}
			//echo $str;
			$res="";
			$res=explode("\t",$str);
			//$res=explode("\n",$res);
			$count=count($res);
			//print_r($res);
			//echo "count:"+$count;
			
			echo"
					<table border='1'>
						<tr>
							<td>Field Name</td>
							<td>Type</td>
						</tr>";
			$j=0;			
			for($i=0;$i<$count;$i++)
			{
			
				echo"					
					<tr>
						<td>".$res[$i+$j]."</td>
						<td>".$res[$i+$j+1]."</td>
					</tr>
				";
				$j++;
			
			}
			echo"					
					</table>
				";
			
		}
		
	
	?>

 
</body>
<?php include 'menu.php'; ?>

</html>