<?php
//刪除table中重複的資料，非必要不使用
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

    $Law_array = array();
    $sql="SELECT * FROM text_dir";
    $result = mysql_query($sql);
    $law_size = 0;
    $total =0;
    while($row = mysql_fetch_array($result))
    {
		echo $row['lawtext_id'];
		$sql = "ALTER IGNORE TABLE ".$row['lawtext_id']." ADD UNIQUE INDEX(`num`);";
		mysql_query($sql);
		$law_size++;
	}
	echo "table number:\t".$law_size."\n";
?>
