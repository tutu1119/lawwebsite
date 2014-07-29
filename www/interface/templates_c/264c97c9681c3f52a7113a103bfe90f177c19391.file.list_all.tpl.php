<?php /* Smarty version Smarty-3.1.18, created on 2014-06-26 12:31:40
         compiled from "./interface/templates/list_all.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1922120007539815d5afff54-76331518%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '264c97c9681c3f52a7113a103bfe90f177c19391' => 
    array (
      0 => './interface/templates/list_all.tpl',
      1 => 1403757096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1922120007539815d5afff54-76331518',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_539815d5b56389_10228390',
  'variables' => 
  array (
    'list_all' => 0,
    'each_data' => 0,
    'data_context' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_539815d5b56389_10228390')) {function content_539815d5b56389_10228390($_smarty_tpl) {?><html>
<link href="icon.ico" rel="SHORTCUT ICON" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="interface/templates/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="interface/templates/js/bootstrap.min.js"></script>
<link href="interface/templates/css/body.css" rel="stylesheet" media="screen">
<head>
	<title>CJKT SBD</title>
</head>

<body class="listall">
	
	<h1 style="color: #08c;">CJKT SBD</h1>
	<p style="text-align: right;">2014.06.26 modify</p>	
	<hr>
	<p><input onclick="window.close();" value="Exit" type="button" class="btn" style="height:40px;width:70px;"></p><br>
	<div>	
		<table border="1" class="text-center table-hover table-condensed">
		<tbody >
			<tr class="boldface" >
				<td  style="width: 35px;"></td>
				
				<td  colspan="5">Japan</td>
				<td  colspan="7">Korea</td>
				<td  colspan="5">Taiwan</td>
				<td  colspan="5">China</td>
			</tr>
			<tr>
				<td>ID</td>

				
				<td>Japanese</td>
				<td>statutory</td>
				<td>equivalent</td>
				<td>statutory</td>
				<td>Japanese->English</td>
				
				<td>Korean (Traditional Chinese Ideogram)</td>
				<td>Korean (Hangul)</td>
				<td>statutory</td>
				<td>equivalent</td>
				<td>statutory</td>
				<td>Korean->English(original)</td>
				<td>Korean->English(extended)</td>
				
				<td>Traditional Chinese</td>
				<td>statutory</td>
				<td>equivalent</td>
				<td>statutory</td>
				<td>Traditonal Chinese->English</td>
				
				<td>Simplified Chinese</td>
				<td>statutory</td>
				<td>equivalent</td>
				<td>statutory</td>
				<td>Simplified Chinese->English</td>
				
			</tr>
			
			<?php  $_smarty_tpl->tpl_vars['each_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['each_data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_all']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['each_data']->key => $_smarty_tpl->tpl_vars['each_data']->value) {
$_smarty_tpl->tpl_vars['each_data']->_loop = true;
?>
			<tr>
				<?php  $_smarty_tpl->tpl_vars['data_context'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data_context']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['each_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data_context']->key => $_smarty_tpl->tpl_vars['data_context']->value) {
$_smarty_tpl->tpl_vars['data_context']->_loop = true;
?>
					<td><?php echo $_smarty_tpl->tpl_vars['data_context']->value;?>
</td>			
				<?php } ?>
				<!--<td><a href="show_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['each_data']->value['original_ID'];?>
" target="_blank">Click</a></td>-->
			</tr>
			<?php } ?>
			
		</tbody></table>
	</div>
	
</body>
</html><?php }} ?>
