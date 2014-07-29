<?php /* Smarty version Smarty-3.1.18, created on 2014-06-26 12:31:54
         compiled from "./interface/templates/show.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1081282108537dbefce7b779-93174643%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9b18a6fe0a07aaa06102b61a22f94ca1f57ae42' => 
    array (
      0 => './interface/templates/show.tpl',
      1 => 1403757113,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1081282108537dbefce7b779-93174643',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_537dbefceb7978_48045204',
  'variables' => 
  array (
    'search' => 0,
    'find_option' => 0,
    'japan_check' => 0,
    'japan_count' => 0,
    'korea_check' => 0,
    'korea_count' => 0,
    'taiwan_check' => 0,
    'taiwan_count' => 0,
    'china_check' => 0,
    'china_count' => 0,
    'temp' => 0,
    'list_all' => 0,
    'each_data' => 0,
    'data_context' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_537dbefceb7978_48045204')) {function content_537dbefceb7978_48045204($_smarty_tpl) {?><html>
<link href="icon.ico" rel="SHORTCUT ICON" type="image/x-icon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="interface/templates/css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="interface/templates/js/bootstrap.min.js"></script>
<script type="text/javascript" src="interface/templates/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="interface/templates/js/jquery.tablePagination.0.5.js"></script>
<script src="interface/templates/js/CheckBox.js"></script>
<link href="interface/templates/css/body.css" rel="stylesheet" media="screen">

<link href="interface/templates/css/tablebar.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="interface/templates/js/tablebar.js"></script>

<head>
	<title>CJKT SBD</title>
</head>

<body class="listbody">
	
	<h1 style="color: #08c;"><a href="show.php" >CJKT SBD</a></h1>
	<p style="text-align: right;">2014.06.26 modify</p>	
	<hr>
	<ul>
		<li><a href="list_all.php" target="_blank">The whole file</a></li><br>
		<form method = "post" action ="show.php">		
		
		<li>Search 
			<input type=text class="input-medium search-query" style="height:35px;width:200px;" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
			<input  type="radio" name="select_type" value="id">ID
			<input  type="radio" name="select_type" value="english" checked>English
			<input type="submit" id="find" name="find" class="btn" style="height:30px;width:60px;" value="Find" />
		</li><br>	
	<?php if ($_smarty_tpl->tpl_vars['find_option']->value!=1) {?>	
		<li><p>Display Option</p>
		<ul>
			<li style='list-style-type:none;'>
				<input type="checkbox" name="Japan" value="japan" onclick="return show('japan_tag');"/>Japan<br>
				<div id="japan_tag" style="display: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="japan_all" name="japan_check[]" value="all"  onclick="$('table').showAll('japan');"/> ALL
					
					<div id="japan_option" style="display: inline;">
					<input class="japan_group" type="checkbox" id="japan_chinese" name="japan_check[]" value="1"  onclick="$('table').removeCol(2);" checked/>Japanese
					<input class="japan_group" type="checkbox" id="japan_statutory" name="japan_check[]" value="2" onclick="$('table').removeCol(3);" /> statutory
					<input class="japan_group" type="checkbox" id="japan_equivalent" name="japan_check[]" value="3" onclick="$('table').removeCol(4);"/> equivalent
					<input class="japan_group" type="checkbox" id="japan_equivalent_statutory" name="japan_check[]" value="4" onclick="$('table').removeCol(5);"/> statutory
					<input class="japan_group" type="checkbox" id="japan_toenglish" name="japan_check[]" value="5" " onclick="$('table').removeCol(6);" checked/> Japanese->English	
					</div>
				</div>
			</li>
			
			<li style='list-style-type:none;'>
				<input type="checkbox" name="Korea" value="korea" onclick="return show('korea_tag');"/>Korea<br>
				<div id="korea_tag" style="display: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="korea_all" name="korea_check[]" value="all" onclick="$('table').showAll('korea');"/> ALL
					
					<div id="korea_option" style="display: inline;">
					<input class="korea_group" type="checkbox" id="korea_chinese" name="korea_check[]" value="1" onclick="$('table').removeCol(7);" checked /> Korean(Traditional Chinese Ideogram)
					<input class="korea_group" type="checkbox" id="korean" name="korea_check[]" value="2" onclick="$('table').removeCol(8);"  checked/> Korean(Hangul)
					<input class="korea_group" type="checkbox" id="korea_statutory" name="korea_check[]" value="3" onclick="$('table').removeCol(9);"/> statutory
					<input class="korea_group" type="checkbox" id="korea_equivalent" name="korea_check[]" value="4" onclick="$('table').removeCol(10);"/> equivalent
					<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input class="korea_group" type="checkbox" id="korea_equivalent_statutory" name="korea_check[]" onclick="$('table').removeCol(11);"/> statutory
					<input class="korea_group" type="checkbox" id="o_korea_toenglish" name="korea_check[]" value="6" onclick="$('table').removeCol(12);" checked /> Korean->English(original)
					<input class="korea_group" type="checkbox" id="e_korea_toenglish" name="korea_check[]" value="7" onclick="$('table').removeCol(13);"/>Korean->English(extended)
					</div>
					
				</div>
			</li>
			<li style='list-style-type:none;'>
				<input type="checkbox" name="Taiwan" value="taiwan" onclick="return show('taiwan_tag');"/>Taiwan<br>
				<div id="taiwan_tag" style="display: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="checkbox" id="taiwan_all" name="taiwan_check[]" value="all" onclick="$('table').showAll('taiwan');"/> ALL
					
					<div id="taiwan_option" style="display: inline;">
					<input class="taiwan_group" type="checkbox" id="taiwan_chinese" name="taiwan_check[]" value="1" onclick="$('table').removeCol(14);"  checked/> Traditional Chinese
					<input class="taiwan_group" type="checkbox" id="taiwan_statutory" name="taiwan_check[]" value="2" onclick="$('table').removeCol(15);"/> statutory
					<input class="taiwan_group" type="checkbox" id="taiwan_equivalent" name="taiwan_check[]" value="3" onclick="$('table').removeCol(16);"/> equivalent
					<input class="taiwan_group" type="checkbox" id="taiwan_equivalent_statutory" name="taiwan_check[]" value="4" onclick="$('table').removeCol(17);"/> statutory
					<input class="taiwan_group" type="checkbox" id="taiwan_toenglish" name="taiwan_check[]" value= "5" onclick="$('table').removeCol(18);" checked/> Traditonal Chinese->English
					</div>
				</div>
			</li>
			<li style='list-style-type:none;'>
				<input type="checkbox" name="China" value="china" onclick="return show('china_tag');" />China<br>
				<div id="china_tag" style="display: none;">
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					<input type="checkbox" id="china_all" name="china_check[]" value="all" onclick="$('table').showAll('china');"/> ALL
					<div id="china_option" style="display: inline;">
					<input class="china_group" type="checkbox" id="china_chinese" name="china_check[]" value="1" onclick="$('table').removeCol(19);" checked/> Simplified Chinese
					<input class="china_group" type="checkbox" id="china_statutory" name="china_check[]" value="2" onclick="$('table').removeCol(20);"/> statutory
					<input class="china_group" type="checkbox" id="china_equivalent" name="china_check[]" value="3" onclick="$('table').removeCol(21);"/> equivalent
					<input class="china_group" type="checkbox" id="china_equivalent_statutory" name="china_check[]" value="4" onclick="$('table').removeCol(22);"/> statutory
					<input class="china_group" type="checkbox" id="china_toenglish" name="china_check[]" value="5" onclick="$('table').removeCol(23);" checked/> Simplified Chinese->English			
					</div>
				</div>
			</li>
		</ul>
		<?php }?>
		</li>	
	</ul>
	</form>
	<div>
		<table id="menuTable" border="1" class="text-center table-hover table-condensed " >

		<thead>
			<tr  class="boldface " >
				<th  style="width: 30px;"></th>
			<?php if ($_smarty_tpl->tpl_vars['find_option']->value==1) {?>
				<?php if ($_smarty_tpl->tpl_vars['japan_check']->value[0]=='all') {?>
					<th  colspan="5">Japan</th>
				<?php } elseif ($_smarty_tpl->tpl_vars['japan_count']->value!=0) {?>
					<th  colspan="<?php echo $_smarty_tpl->tpl_vars['japan_count']->value;?>
">Japan</th>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['korea_check']->value[0]=='all') {?>
					<th  colspan="7">Korea</th>
				<?php } elseif ($_smarty_tpl->tpl_vars['korea_count']->value!=0) {?>
					<th  colspan="<?php echo $_smarty_tpl->tpl_vars['korea_count']->value;?>
">Korea</th>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['taiwan_check']->value[0]=='all') {?>
					<th  colspan="5">Taiwan</th>
				<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_count']->value!=0) {?>
					<th  colspan="<?php echo $_smarty_tpl->tpl_vars['taiwan_count']->value;?>
">Taiwan</th>
				<?php }?>
				<?php if ($_smarty_tpl->tpl_vars['china_check']->value[0]=='all') {?>
					<th  colspan="5">China</th>
				<?php } elseif ($_smarty_tpl->tpl_vars['china_count']->value!=0) {?>
					<th  colspan="<?php echo $_smarty_tpl->tpl_vars['china_count']->value;?>
">China</th>
				<?php }?>
				
			<?php } elseif ($_smarty_tpl->tpl_vars['find_option']->value==0) {?>				
				<th  id='japan' colspan="2">Japan</th>
				<th  id='korea' colspan="3">Korea</th>
				<th  id='taiwan' colspan="2">Taiwan</th>
				<th  id='china' colspan="2">China</th>
			<?php }?>
				<th>See Detail</th>
			</tr>

			<tr>
		</thead>
		<tbody>
			<td style="width: 30px;">ID</td>
			<?php if ($_smarty_tpl->tpl_vars['find_option']->value==1) {?>			
				<?php if ($_smarty_tpl->tpl_vars['japan_check']->value[0]=='all') {?>
					<td>Japanese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Japanese->English</td>
				<?php } elseif ($_smarty_tpl->tpl_vars['japan_check']->value[0]!=0) {?>
					<?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['temp']->step = 1;$_smarty_tpl->tpl_vars['temp']->total = (int) ceil(($_smarty_tpl->tpl_vars['temp']->step > 0 ? ($_smarty_tpl->tpl_vars['japan_count']->value-1)+1 - (0) : 0-(($_smarty_tpl->tpl_vars['japan_count']->value-1))+1)/abs($_smarty_tpl->tpl_vars['temp']->step));
if ($_smarty_tpl->tpl_vars['temp']->total > 0) {
for ($_smarty_tpl->tpl_vars['temp']->value = 0, $_smarty_tpl->tpl_vars['temp']->iteration = 1;$_smarty_tpl->tpl_vars['temp']->iteration <= $_smarty_tpl->tpl_vars['temp']->total;$_smarty_tpl->tpl_vars['temp']->value += $_smarty_tpl->tpl_vars['temp']->step, $_smarty_tpl->tpl_vars['temp']->iteration++) {
$_smarty_tpl->tpl_vars['temp']->first = $_smarty_tpl->tpl_vars['temp']->iteration == 1;$_smarty_tpl->tpl_vars['temp']->last = $_smarty_tpl->tpl_vars['temp']->iteration == $_smarty_tpl->tpl_vars['temp']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['japan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==1) {?>
							<td>Japanese</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['japan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==2) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['japan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==3) {?>
							<td>equivalent</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['japan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==4) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['japan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==5) {?>
							<td>Japanese->English</td>
						<?php }?>
					<?php }} ?>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['korea_check']->value[0]=='all') {?>
					<td>Korean(Traditional Chinese Ideogram)</td>
					<td>Korean (Hangul)</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Korean->English(original)</td>
					<td>Korean->English(extended)</td>
				<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[0]!=0) {?>
					<?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['temp']->step = 1;$_smarty_tpl->tpl_vars['temp']->total = (int) ceil(($_smarty_tpl->tpl_vars['temp']->step > 0 ? ($_smarty_tpl->tpl_vars['korea_count']->value-1)+1 - (0) : 0-(($_smarty_tpl->tpl_vars['korea_count']->value-1))+1)/abs($_smarty_tpl->tpl_vars['temp']->step));
if ($_smarty_tpl->tpl_vars['temp']->total > 0) {
for ($_smarty_tpl->tpl_vars['temp']->value = 0, $_smarty_tpl->tpl_vars['temp']->iteration = 1;$_smarty_tpl->tpl_vars['temp']->iteration <= $_smarty_tpl->tpl_vars['temp']->total;$_smarty_tpl->tpl_vars['temp']->value += $_smarty_tpl->tpl_vars['temp']->step, $_smarty_tpl->tpl_vars['temp']->iteration++) {
$_smarty_tpl->tpl_vars['temp']->first = $_smarty_tpl->tpl_vars['temp']->iteration == 1;$_smarty_tpl->tpl_vars['temp']->last = $_smarty_tpl->tpl_vars['temp']->iteration == $_smarty_tpl->tpl_vars['temp']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==1) {?>
							<td>Korean(Traditional Chinese Ideogram)</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==2) {?>
							<td>Korean(Hangul)</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==3) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==4) {?>
							<td>equivalent</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==5) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==6) {?>
							<td>Korean->English(original)</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['korea_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==7) {?>
							<td>Korean->English(extended)</td>
						<?php }?>
					<?php }} ?>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['taiwan_check']->value[0]=='all') {?>
					<td>Traditional Chinese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Traditonal Chinese->English</td>
				<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_check']->value[0]!=0) {?>
					<?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['temp']->step = 1;$_smarty_tpl->tpl_vars['temp']->total = (int) ceil(($_smarty_tpl->tpl_vars['temp']->step > 0 ? ($_smarty_tpl->tpl_vars['taiwan_count']->value-1)+1 - (0) : 0-(($_smarty_tpl->tpl_vars['taiwan_count']->value-1))+1)/abs($_smarty_tpl->tpl_vars['temp']->step));
if ($_smarty_tpl->tpl_vars['temp']->total > 0) {
for ($_smarty_tpl->tpl_vars['temp']->value = 0, $_smarty_tpl->tpl_vars['temp']->iteration = 1;$_smarty_tpl->tpl_vars['temp']->iteration <= $_smarty_tpl->tpl_vars['temp']->total;$_smarty_tpl->tpl_vars['temp']->value += $_smarty_tpl->tpl_vars['temp']->step, $_smarty_tpl->tpl_vars['temp']->iteration++) {
$_smarty_tpl->tpl_vars['temp']->first = $_smarty_tpl->tpl_vars['temp']->iteration == 1;$_smarty_tpl->tpl_vars['temp']->last = $_smarty_tpl->tpl_vars['temp']->iteration == $_smarty_tpl->tpl_vars['temp']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['taiwan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==1) {?>
							<td>Traditional Chinese</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==2) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==3) {?>
							<td>equivalent</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==4) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['taiwan_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==5) {?>
							<td>Traditonal Chinese->English</td>
						<?php }?>
					<?php }} ?>
				<?php }?>
				
				<?php if ($_smarty_tpl->tpl_vars['china_check']->value[0]=='all') {?>
					<td>Simplified Chinese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Simplified Chinese->English</td>
				<?php } elseif ($_smarty_tpl->tpl_vars['china_check']->value[0]!=0) {?>
					<?php $_smarty_tpl->tpl_vars['temp'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['temp']->step = 1;$_smarty_tpl->tpl_vars['temp']->total = (int) ceil(($_smarty_tpl->tpl_vars['temp']->step > 0 ? ($_smarty_tpl->tpl_vars['china_count']->value-1)+1 - (0) : 0-(($_smarty_tpl->tpl_vars['china_count']->value-1))+1)/abs($_smarty_tpl->tpl_vars['temp']->step));
if ($_smarty_tpl->tpl_vars['temp']->total > 0) {
for ($_smarty_tpl->tpl_vars['temp']->value = 0, $_smarty_tpl->tpl_vars['temp']->iteration = 1;$_smarty_tpl->tpl_vars['temp']->iteration <= $_smarty_tpl->tpl_vars['temp']->total;$_smarty_tpl->tpl_vars['temp']->value += $_smarty_tpl->tpl_vars['temp']->step, $_smarty_tpl->tpl_vars['temp']->iteration++) {
$_smarty_tpl->tpl_vars['temp']->first = $_smarty_tpl->tpl_vars['temp']->iteration == 1;$_smarty_tpl->tpl_vars['temp']->last = $_smarty_tpl->tpl_vars['temp']->iteration == $_smarty_tpl->tpl_vars['temp']->total;?>
						<?php if ($_smarty_tpl->tpl_vars['china_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==1) {?>
							<td>Simplified Chinese</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['china_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==2) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['china_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==3) {?>
							<td>equivalent</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['china_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==4) {?>
							<td>statutory</td>
						<?php } elseif ($_smarty_tpl->tpl_vars['china_check']->value[$_smarty_tpl->tpl_vars['temp']->value]==5) {?>
							<td>Simplified Chinese->English</td>
						<?php }?>
					<?php }} ?>
				<?php }?>
				
			<?php } elseif ($_smarty_tpl->tpl_vars['find_option']->value==0) {?>
	
				<td>Japanese</td>
				<td style="display:none">statutory</td>
				<td style="display:none">equivalent</td>
				<td style="display:none">statutory</td>
				<td>Japanese->English</td>
				
				<td>Korean (Traditional Chinese Ideogram)</td>
				<td>Korean (Hangul)</td>
				<td style="display:none">statutory</td>
				<td style="display:none">equivalent</td>
				<td style="display:none">statutory</td>				
				<td >Korean->English(original)</td>
				<td style="display:none">Korean->English(extended)</td>
				
				<td>Traditional Chinese</td>
				<td style="display:none">statutory</td>
				<td style="display:none">equivalent</td>
				<td style="display:none">statutory</td>
				<td>Traditonal Chinese->English</td>
				
				<td>Simplified Chinese</td>
				<td style="display:none">statutory</td>
				<td style="display:none">equivalent</td>
				<td style="display:none">statutory</td>
				<td>Simplified Chinese->English</td>	
			<?php }?>

			<td></td>	
			</tr>
			
		
		


		<?php if ($_smarty_tpl->tpl_vars['find_option']->value==0) {?>	
			<?php  $_smarty_tpl->tpl_vars['each_data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['each_data']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list_all']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['each_data']->key => $_smarty_tpl->tpl_vars['each_data']->value) {
$_smarty_tpl->tpl_vars['each_data']->_loop = true;
?>
			<tr>
				
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['original_ID'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['japanese'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['japanese_statutory'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['japanese_equivalent'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['japanese_equivalent_statutory'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['japanese_to_english'];?>
</td>
				
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['korean_to_chinese'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['korean'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['korean_statutory'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['korean_equivalent'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['korean_equivalent_statutory'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['o_korean_to_english'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['e_korean_to_english'];?>
</td>
				
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['chinese_traditionalshape'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['chinese_statutory'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['chinese_equivalent'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['chinese_equivalent_statutory'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['traditonalchinese_to_english'];?>
</td>

				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['china'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['china_statutory'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['china_equivalent'];?>
</td>
				<td style="display:none"><?php echo $_smarty_tpl->tpl_vars['each_data']->value['china_equivalent_statutory'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['each_data']->value['china_to_english'];?>
</td>
				
				<!--
				<?php  $_smarty_tpl->tpl_vars['data_context'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data_context']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['each_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data_context']->key => $_smarty_tpl->tpl_vars['data_context']->value) {
$_smarty_tpl->tpl_vars['data_context']->_loop = true;
?>					
					<td><?php echo $_smarty_tpl->tpl_vars['data_context']->value;?>
</td>			
				<?php } ?>
				-->
				<td><a href="show_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['each_data']->value['original_ID'];?>
" target="_blank">Click</a></td>
			
			</tr>
			<?php } ?>
		<?php } else { ?>
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
			<td><a href="show_detail.php?id=<?php echo $_smarty_tpl->tpl_vars['each_data']->value['original_ID'];?>
" target="_blank">Click</a></td>
			</tr>
			<?php } ?>
		<?php }?>
		
		</tbody></table>
	</div>
</body>
</html><?php }} ?>
