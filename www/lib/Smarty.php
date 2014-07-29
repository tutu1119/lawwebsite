<?php
include "Smarty-3.1.18/libs/Smarty.class.php";
//define('__SITE_ROOT', '/home/hsng/www/interface'); // 最後沒有斜線
$tpl = new Smarty();
$tpl->setTemplateDir('./interface/templates');
$tpl->setCompileDir('./interface/templates_c');
$tpl->setCacheDir('./interface/cache');
$tpl->setConfigDir('./interface/configs');
$tpl->left_delimiter = '<{';
		$tpl->right_delimiter = '}>';
		?>
