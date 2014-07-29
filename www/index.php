<?php
require_once("lib/Smarty.php");
$test=0;
$tpl->assign("test", $test);
$tpl->display('index.tpl');

echo "Config finish! </br>";
?>
