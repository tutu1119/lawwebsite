<?php /* Smarty version Smarty-3.1.18, created on 2014-06-23 16:55:25
         compiled from "./interface/templates/show_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11302566535390662b2c66d5-54802096%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e1accf3c3e51118008b963642286a72771e1358' => 
    array (
      0 => './interface/templates/show_detail.tpl',
      1 => 1403513724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11302566535390662b2c66d5-54802096',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5390662b2fc450_47321371',
  'variables' => 
  array (
    'japan' => 0,
    'korea' => 0,
    'taiwan' => 0,
    'china' => 0,
    'res_count' => 0,
    'num' => 0,
    'res_chinese' => 0,
    'res_equal' => 0,
    'count_vorn' => 0,
    'show_vorn' => 0,
    'TIFS_res' => 0,
    'res_over' => 0,
    'res_compound' => 0,
    'res_source' => 0,
    'res_comment' => 0,
    'res_toenglish' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5390662b2fc450_47321371')) {function content_5390662b2fc450_47321371($_smarty_tpl) {?><html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="interface/templates/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="interface/templates/js/bootstrap.min.js"></script>
<link href="interface/templates/css/body.css" rel="stylesheet" media="screen">
<head>
	<title>CJKT SBD show detail</title>
	<link href="icon.ico" rel="SHORTCUT ICON">
</head>

<body class="listbody">	
	<h1 style="color: #08c;"><a href="show.php" >CJKT SBD</a></h1>
	<h2>Show Detail</h2>	
	<p style="font-size: 14px; text-align: right;">
		<span style="color: red;">*</span>
		C for China,J for Japan,K for Koera,T for Taiwan
	</p>	
	<table border="1" class="text-center table-hover table-condensed">
	<tbody>
		<tr>
			<td></td>
			<td colspan="12">Regular Information</td>
			<td colspan="3">Korea Information</td>
		</tr>
		<tr>
			<td></td>
			<td>CJKT Share <i>kanji</i></td>
			<td>Statutory</td>
			<td>Equivalent</td>
			<td>Statutory</td>
			<td>Verb/Noun</td>
			<td>Overlap</td>
			<td>Compound</td>			
			<td>terminology/<br>int’l law/<br>foreign law/<br>social term</br></td>
			<td>Old law</td>
			<td>Source</td>
			<td>Comment</td>		
			<td>English</td>
			<td>Korean(Hangul)</td>
			<td>Korean->English(extended)</td>
		</tr>

		<tr>
			<td class="boldface">J</td>
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_statutory'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_equivalent'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_equivalent_statutory'];?>
</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['comment'];?>
</td>		
			<td><?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_to_english'];?>
</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="boldface">K</td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_to_chinese'];?>
</td>			
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_statutory'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_equivalent'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_equivalent_statutory'];?>
</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['comment'];?>
</td>		
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['o_korean_to_english'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['korean'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['korea']->value['e_korean_to_english'];?>
</td>
		</tr>
		<tr>
			<td class="boldface">T</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_traditionalshape'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_statutory'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_equivalent'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_equivalent_statutory'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['verb_or_noun'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['overlapped'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['compound'];?>
</td>			
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['4type'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['existing_or_old_law'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['source'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['comment'];?>
</td>		
			<td><?php echo $_smarty_tpl->tpl_vars['taiwan']->value['traditonalchinese_to_english'];?>
</td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="boldface">C</td>
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['china'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['china_statutory'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['china_equivalent'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['china_equivalent_statutory'];?>
</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['comment'];?>
</td>		
			<td><?php echo $_smarty_tpl->tpl_vars['china']->value['china_to_english'];?>
</td>
			<td></td>
			<td></td>
		</tr>
	</tbody></table>

	<input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['original_ID'];?>
 />
	<br>
	<p><input onclick="window.close();" value="Exit" type="button" class="btn" style="height:40px;width:70px;">
	<a href="#modify" role="button" class="btn btn-primary" style="height:30px;width:70px;" data-toggle="modal">Edit</a>
	</p>
	<form method = "post" action = "show_detail.php">
	<div id="modify" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: block;width: 40%;margin-left: -20%;">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="modify_Label">Taiwan Edit</h3>
	  </div>
	  <div class="modal-body">
		<ul>
			<div id='chinese_traditional_group'>			
			<li>CJKT Share <i>kanji</i>
				<input type='button' class="btn btn-info btn-mini" value='+' id='addchinese' onclick="Addchinese();">
				<div id="chinese_traditional_1">
				<br>
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[1]==0) {?>
					<input type="text" name="chinese_traditionalshape_1" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_traditionalshape'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[1]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[1])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="chinese_traditionalshape_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_chinese']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>
			
			<div id='chinese_statutory'>
			<li>Statutory
			<br>
				<input type="text" name="chinese_statutory" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_statutory'];?>
">
			</div>
			
			<div id='equivalent_group'>
			<li>Equivalent
				<input type='button' class="btn btn-info btn-mini" value='+' id='addeql' onclick="Addequal();">
				<br>
				<div id="equivalent_1">
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[2]==0) {?>
					<input type="text" name="chinese_equivalent_1" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_equivalent'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[2]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[2])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="chinese_equivalent_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_equal']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>
			
			<div id='equivalent_statutory'>
			<li>Statutory<br>
				<input type="text" name="chinese_equivalent_statutory" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['chinese_equivalent_statutory'];?>
">
			</div>

			<div id='vorn'>	
			<li>Verb/Noun<br>
				<p>
				<?php if ($_smarty_tpl->tpl_vars['count_vorn']->value==0) {?>
					<input type="checkbox" name="vorn[]" value="V">Verb
					<input type="checkbox" name="vorn[]" value="N">Noun
				<?php } elseif ($_smarty_tpl->tpl_vars['count_vorn']->value==1) {?>
					<?php if ($_smarty_tpl->tpl_vars['show_vorn']->value=='V') {?>
						<input type="checkbox" name="vorn[]" value="V" checked>Verb
						<input type="checkbox" name="vorn[]" value="N">Noun
					<?php } elseif ($_smarty_tpl->tpl_vars['show_vorn']->value=='N') {?>
						<input type="checkbox" name="vorn[]" value="V">Verb
						<input type="checkbox" name="vorn[]" value="N" checked>Noun
					<?php }?>
				<?php } elseif ($_smarty_tpl->tpl_vars['count_vorn']->value==2) {?>
					<input type="checkbox" name="vorn[]" value="V" checked>Verb
					<input type="checkbox" name="vorn[]" value="N" checked>Noun
				<?php }?>
				</p>
			</div>
			<div id='4type_group'>
			<li>terminology/int’l law/foreign law/social term<br>
			<p>
				<?php if ($_smarty_tpl->tpl_vars['TIFS_res']->value[0]=="T") {?>
					<input type="checkbox" name="type_group[]" value="T" checked>terminology
				<?php } else { ?>
					<input type="checkbox" name="type_group[]" value="T">terminology
				<?php }?>	

				<?php if ($_smarty_tpl->tpl_vars['TIFS_res']->value[1]=="I") {?>
					<input type="checkbox" name="type_group[]" value="I" checked>int’l law
				<?php } else { ?>
					<input type="checkbox" name="type_group[]" value="I">int’l law
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['TIFS_res']->value[2]=="F") {?>
					<input type="checkbox" name="type_group[]" value="F" checked>foreign law
				<?php } else { ?>
					<input type="checkbox" name="type_group[]" value="F">foreign law
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['TIFS_res']->value[3]=="S") {?>
					<input type="checkbox" name="type_group[]" value="S" checked>social term
				<?php } else { ?>
					<input type="checkbox" name="type_group[]" value="S">social term
				<?php }?>					
			</p>
			</div>
			
			<div id='overlapped_group'>
			<li>Overlap
				<input type='button' class="btn btn-info btn-mini" value='+' id='addover' onclick="Addover();">
				<br>
				<div id="overlapped_1">
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[3]==0) {?>
					<input type="text" name="overlapped_1" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['overlapped'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[3]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[3])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="overlapped_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_over']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>
			
			<div id='compound_group'>			
			<li>Compound
				<input type='button' class="btn btn-info btn-mini" value='+' id='addcompound' onclick="Addcompound();">
				<br>
				<div id="compound_1">
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[4]==0) {?>
					<input type="text" name="compound_1" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['compound'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[4]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[4])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="compound_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_compound']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>		
			
			<div id='existing_or_old'>
			<li>Old law<br>
				<input type="text" name="existing_or_old_law" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['existing_or_old_law'];?>
">
			</div>
			
			<div id='source_group'>
			<li>Source
				<input type='button' class="btn btn-info btn-mini" value='+' id='addscr' onclick="Addsource();">
				<div id="source_1">
				<br>
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[6]==0) {?>
					<input type="text" name="source_1" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['source'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[6]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[6])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="source_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_source']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>
			
			<div id='comment_group'>
			<li>Comment
				<input type='button' class="btn btn-info btn-mini" value='+' id='addcomment' onclick="Addcomment();">
				<div id='comment_1'>
				<br>
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[7]==0) {?>
					<input type="text" name="comment_1" style="height: 30px;" value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['comment'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[7]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[7])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="comment_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_comment']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>

			<div id='toenglish_group'>
			<li>Traditional chinese to English
				<input type='button' class="btn btn-info btn-mini" value='+' id='addtoEN' onclick="AddtoEN();">
				<br>				
				<div id='toenglish_1'>
				<?php if ($_smarty_tpl->tpl_vars['res_count']->value[8]==0) {?>
					<input type="text" name="traditonalchinese_to_english_1" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['traditonalchinese_to_english'];?>
">
				<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['num'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['num']->step = 1;$_smarty_tpl->tpl_vars['num']->total = (int) ceil(($_smarty_tpl->tpl_vars['num']->step > 0 ? $_smarty_tpl->tpl_vars['res_count']->value[8]+1 - (1) : 1-($_smarty_tpl->tpl_vars['res_count']->value[8])+1)/abs($_smarty_tpl->tpl_vars['num']->step));
if ($_smarty_tpl->tpl_vars['num']->total > 0) {
for ($_smarty_tpl->tpl_vars['num']->value = 1, $_smarty_tpl->tpl_vars['num']->iteration = 1;$_smarty_tpl->tpl_vars['num']->iteration <= $_smarty_tpl->tpl_vars['num']->total;$_smarty_tpl->tpl_vars['num']->value += $_smarty_tpl->tpl_vars['num']->step, $_smarty_tpl->tpl_vars['num']->iteration++) {
$_smarty_tpl->tpl_vars['num']->first = $_smarty_tpl->tpl_vars['num']->iteration == 1;$_smarty_tpl->tpl_vars['num']->last = $_smarty_tpl->tpl_vars['num']->iteration == $_smarty_tpl->tpl_vars['num']->total;?>
						<input type="text" name="traditonalchinese_to_english_<?php echo $_smarty_tpl->tpl_vars['num']->value;?>
" style="height: 30px;"  value="<?php echo $_smarty_tpl->tpl_vars['res_toenglish']->value[($_smarty_tpl->tpl_vars['num']->value-1)];?>
"><br>
					<?php }} ?>
				<?php }?>
				</div>
			</div>	
		</ul>
		<input type="hidden" name="china" value="<?php echo $_smarty_tpl->tpl_vars['china']->value['china'];?>
" />
		<input type="hidden" name="china_statutory" value="<?php echo $_smarty_tpl->tpl_vars['china']->value['china_statutory'];?>
" />
		<input type="hidden" name="china_equivalent" value="<?php echo $_smarty_tpl->tpl_vars['china']->value['china_equivalent'];?>
" />
		<input type="hidden" name="china_equivalent_statutory" value="<?php echo $_smarty_tpl->tpl_vars['china']->value['china_equivalent_statutory'];?>
" />
		<input type="hidden" name="china_to_english" value="<?php echo $_smarty_tpl->tpl_vars['china']->value['china_to_english'];?>
" />
		
		<input type="hidden" name="japanese" value="<?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese'];?>
" />
		<input type="hidden" name="japanese_statutory" value="<?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_statutory'];?>
" />
		<input type="hidden" name="japanese_equivalent" value="<?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_equivalent'];?>
" />
		<input type="hidden" name="japanese_equivalent_statutory" value="<?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_equivalent_statutory'];?>
" />
		<input type="hidden" name="japanese_to_english" value="<?php echo $_smarty_tpl->tpl_vars['japan']->value['japanese_to_english'];?>
" />
		
		<input type="hidden" name="korean" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['korean'];?>
" />
		<input type="hidden" name="korean_to_chinese" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_to_chinese'];?>
" />
		<input type="hidden" name="korean_statutory" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_statutory'];?>
" />		
		<input type="hidden" name="korean_equivalent" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_equivalent'];?>
" />
		<input type="hidden" name="korean_equivalent_statutory" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['korean_equivalent_statutory'];?>
" />
		<input type="hidden" name="o_korean_to_english" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['o_korean_to_english'];?>
" />		
		<input type="hidden" name="e_korean_to_english" value="<?php echo $_smarty_tpl->tpl_vars['korea']->value['e_korean_to_english'];?>
" />
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" style="height:40px;width:70px;" >Exit</button>
		<input type="submit" class="btn btn-primary" style="height:40px;width:70px;" name="submit" value="Submit">
		<input type="hidden" name="id" value=<?php echo $_smarty_tpl->tpl_vars['taiwan']->value['original_ID'];?>
 />
	  </div>
	</div>
	</form>
</body>
</html><?php }} ?>
