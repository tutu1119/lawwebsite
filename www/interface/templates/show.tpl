<html>
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
			<input type=text class="input-medium search-query" style="height:35px;width:200px;" name="search" value="<{$search}>">
			<input  type="radio" name="select_type" value="id">ID
			<input  type="radio" name="select_type" value="english" checked>English
			<input type="submit" id="find" name="find" class="btn" style="height:30px;width:60px;" value="Find" />
		</li><br>	
	<{if $find_option ne 1}>	
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
		<{/if}>
		</li>	
	</ul>
	</form>
	<div>
		<table id="menuTable" border="1" class="text-center table-hover table-condensed " >

		<thead>
			<tr  class="boldface " >
				<th  style="width: 30px;"></th>
			<{if $find_option eq 1}>
				<{if $japan_check[0] eq 'all'}>
					<th  colspan="5">Japan</th>
				<{else if $japan_count ne 0}>
					<th  colspan="<{$japan_count}>">Japan</th>
				<{/if}>
				<{if $korea_check[0] eq 'all'}>
					<th  colspan="7">Korea</th>
				<{else if $korea_count ne 0}>
					<th  colspan="<{$korea_count}>">Korea</th>
				<{/if}>
				<{if $taiwan_check[0] eq 'all'}>
					<th  colspan="5">Taiwan</th>
				<{else if $taiwan_count ne 0}>
					<th  colspan="<{$taiwan_count}>">Taiwan</th>
				<{/if}>
				<{if $china_check[0] eq 'all'}>
					<th  colspan="5">China</th>
				<{else if $china_count ne 0}>
					<th  colspan="<{$china_count}>">China</th>
				<{/if}>
				
			<{else if $find_option eq 0}>				
				<th  id='japan' colspan="2">Japan</th>
				<th  id='korea' colspan="3">Korea</th>
				<th  id='taiwan' colspan="2">Taiwan</th>
				<th  id='china' colspan="2">China</th>
			<{/if}>
				<th>See Detail</th>
			</tr>

			<tr>
		</thead>
		<tbody>
			<td style="width: 30px;">ID</td>
			<{if $find_option eq 1}>			
				<{if $japan_check[0] eq 'all'}>
					<td>Japanese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Japanese->English</td>
				<{else if $japan_check[0] ne 0}>
					<{for $temp=0 to ($japan_count-1)}>
						<{if $japan_check[$temp] eq 1}>
							<td>Japanese</td>
						<{else if $japan_check[$temp] eq 2}>
							<td>statutory</td>
						<{else if $japan_check[$temp] eq 3}>
							<td>equivalent</td>
						<{else if $japan_check[$temp] eq 4}>
							<td>statutory</td>
						<{else if $japan_check[$temp] eq 5}>
							<td>Japanese->English</td>
						<{/if}>
					<{/for}>
				<{/if}>

				<{if $korea_check[0] eq 'all'}>
					<td>Korean(Traditional Chinese Ideogram)</td>
					<td>Korean (Hangul)</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Korean->English(original)</td>
					<td>Korean->English(extended)</td>
				<{else if $korea_check[0] ne 0}>
					<{for $temp=0 to ($korea_count-1)}>
						<{if $korea_check[$temp] eq 1}>
							<td>Korean(Traditional Chinese Ideogram)</td>
						<{else if $korea_check[$temp] eq 2}>
							<td>Korean(Hangul)</td>
						<{else if $korea_check[$temp] eq 3}>
							<td>statutory</td>
						<{else if $korea_check[$temp] eq 4}>
							<td>equivalent</td>
						<{else if $korea_check[$temp] eq 5}>
							<td>statutory</td>
						<{else if $korea_check[$temp] eq 6}>
							<td>Korean->English(original)</td>
						<{else if $korea_check[$temp] eq 7}>
							<td>Korean->English(extended)</td>
						<{/if}>
					<{/for}>
				<{/if}>

				<{if $taiwan_check[0] eq 'all'}>
					<td>Traditional Chinese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Traditonal Chinese->English</td>
				<{else if $taiwan_check[0] ne 0}>
					<{for $temp=0 to ($taiwan_count-1)}>
						<{if $taiwan_check[$temp] eq 1}>
							<td>Traditional Chinese</td>
						<{else if $taiwan_check[$temp] eq 2}>
							<td>statutory</td>
						<{else if $taiwan_check[$temp] eq 3}>
							<td>equivalent</td>
						<{else if $taiwan_check[$temp] eq 4}>
							<td>statutory</td>
						<{else if $taiwan_check[$temp] eq 5}>
							<td>Traditonal Chinese->English</td>
						<{/if}>
					<{/for}>
				<{/if}>
				
				<{if $china_check[0] eq 'all'}>
					<td>Simplified Chinese</td>
					<td>statutory</td>
					<td>equivalent</td>
					<td>statutory</td>
					<td>Simplified Chinese->English</td>
				<{else if $china_check[0] ne 0}>
					<{for $temp=0 to ($china_count-1)}>
						<{if $china_check[$temp] eq 1}>
							<td>Simplified Chinese</td>
						<{else if $china_check[$temp] eq 2}>
							<td>statutory</td>
						<{else if $china_check[$temp] eq 3}>
							<td>equivalent</td>
						<{else if $china_check[$temp] eq 4}>
							<td>statutory</td>
						<{else if $china_check[$temp] eq 5}>
							<td>Simplified Chinese->English</td>
						<{/if}>
					<{/for}>
				<{/if}>
				
			<{else if $find_option eq 0}>
	
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
			<{/if}>

			<td></td>	
			</tr>
			
		
		


		<{if $find_option eq 0}>	
			<{foreach from=$list_all item=each_data}>
			<tr>
				
				<td><{$each_data['original_ID']}></td>
				<td><{$each_data['japanese']}></td>
				<td style="display:none"><{$each_data['japanese_statutory']}></td>
				<td style="display:none"><{$each_data['japanese_equivalent']}></td>
				<td style="display:none"><{$each_data['japanese_equivalent_statutory']}></td>
				<td><{$each_data['japanese_to_english']}></td>
				
				<td><{$each_data['korean_to_chinese']}></td>
				<td><{$each_data['korean']}></td>
				<td style="display:none"><{$each_data['korean_statutory']}></td>
				<td style="display:none"><{$each_data['korean_equivalent']}></td>
				<td style="display:none"><{$each_data['korean_equivalent_statutory']}></td>
				<td><{$each_data['o_korean_to_english']}></td>
				<td style="display:none"><{$each_data['e_korean_to_english']}></td>
				
				<td><{$each_data['chinese_traditionalshape']}></td>
				<td style="display:none"><{$each_data['chinese_statutory']}></td>
				<td style="display:none"><{$each_data['chinese_equivalent']}></td>
				<td style="display:none"><{$each_data['chinese_equivalent_statutory']}></td>
				<td><{$each_data['traditonalchinese_to_english']}></td>

				<td><{$each_data['china']}></td>
				<td style="display:none"><{$each_data['china_statutory']}></td>
				<td style="display:none"><{$each_data['china_equivalent']}></td>
				<td style="display:none"><{$each_data['china_equivalent_statutory']}></td>
				<td><{$each_data['china_to_english']}></td>
				
				<!--
				<{foreach from=$each_data item=data_context}>					
					<td><{$data_context}></td>			
				<{/foreach}>
				-->
				<td><a href="show_detail.php?id=<{$each_data['original_ID']}>" target="_blank">Click</a></td>
			
			</tr>
			<{/foreach}>
		<{else}>
			<{foreach from=$list_all item=each_data}>
			<tr>
			
				<{foreach from=$each_data item=data_context}>					
					<td><{$data_context}></td>			
				<{/foreach}>
			<td><a href="show_detail.php?id=<{$each_data['original_ID']}>" target="_blank">Click</a></td>
			</tr>
			<{/foreach}>
		<{/if}>
		
		</tbody></table>
	</div>
</body>
</html>