<html>
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
			<td><{$japan['japanese']}></td>
			<td><{$japan['japanese_statutory']}></td>
			<td><{$japan['japanese_equivalent']}></td>
			<td><{$japan['japanese_equivalent_statutory']}></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><{$japan['comment']}></td>		
			<td><{$japan['japanese_to_english']}></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="boldface">K</td>
			<td><{$korea['korean_to_chinese']}></td>			
			<td><{$korea['korean_statutory']}></td>
			<td><{$korea['korean_equivalent']}></td>
			<td><{$korea['korean_equivalent_statutory']}></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><{$korea['comment']}></td>		
			<td><{$korea['o_korean_to_english']}></td>
			<td><{$korea['korean']}></td>
			<td><{$korea['e_korean_to_english']}></td>
		</tr>
		<tr>
			<td class="boldface">T</td>
			<td><{$taiwan['chinese_traditionalshape']}></td>
			<td><{$taiwan['chinese_statutory']}></td>
			<td><{$taiwan['chinese_equivalent']}></td>
			<td><{$taiwan['chinese_equivalent_statutory']}></td>
			<td><{$taiwan['verb_or_noun']}></td>
			<td><{$taiwan['overlapped']}></td>
			<td><{$taiwan['compound']}></td>			
			<td><{$taiwan['4type']}></td>
			<td><{$taiwan['existing_or_old_law']}></td>
			<td><{$taiwan['source']}></td>
			<td><{$taiwan['comment']}></td>		
			<td><{$taiwan['traditonalchinese_to_english']}></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td class="boldface">C</td>
			<td><{$china['china']}></td>
			<td><{$china['china_statutory']}></td>
			<td><{$china['china_equivalent']}></td>
			<td><{$china['china_equivalent_statutory']}></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td><{$china['comment']}></td>		
			<td><{$china['china_to_english']}></td>
			<td></td>
			<td></td>
		</tr>
	</tbody></table>

	<input type="hidden" name="id" value=<{$taiwan['original_ID']}> />
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
				<{if $res_count[1] eq 0}>
					<input type="text" name="chinese_traditionalshape_1" style="height: 30px;" value="<{$taiwan['chinese_traditionalshape']}>">
				<{else}>
					<{for $num=1 to $res_count[1]}>
						<input type="text" name="chinese_traditionalshape_<{$num}>" style="height: 30px;"  value="<{$res_chinese[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>
			
			<div id='chinese_statutory'>
			<li>Statutory
			<br>
				<input type="text" name="chinese_statutory" style="height: 30px;" value="<{$taiwan['chinese_statutory']}>">
			</div>
			
			<div id='equivalent_group'>
			<li>Equivalent
				<input type='button' class="btn btn-info btn-mini" value='+' id='addeql' onclick="Addequal();">
				<br>
				<div id="equivalent_1">
				<{if $res_count[2] eq 0}>
					<input type="text" name="chinese_equivalent_1" style="height: 30px;"  value="<{$taiwan['chinese_equivalent']}>">
				<{else}>
					<{for $num=1 to $res_count[2]}>
						<input type="text" name="chinese_equivalent_<{$num}>" style="height: 30px;"  value="<{$res_equal[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>
			
			<div id='equivalent_statutory'>
			<li>Statutory<br>
				<input type="text" name="chinese_equivalent_statutory" style="height: 30px;" value="<{$taiwan['chinese_equivalent_statutory']}>">
			</div>

			<div id='vorn'>	
			<li>Verb/Noun<br>
				<p>
				<{if $count_vorn eq 0}>
					<input type="checkbox" name="vorn[]" value="V">Verb
					<input type="checkbox" name="vorn[]" value="N">Noun
				<{else if $count_vorn eq 1}>
					<{if $show_vorn eq 'V'}>
						<input type="checkbox" name="vorn[]" value="V" checked>Verb
						<input type="checkbox" name="vorn[]" value="N">Noun
					<{else if $show_vorn eq 'N'}>
						<input type="checkbox" name="vorn[]" value="V">Verb
						<input type="checkbox" name="vorn[]" value="N" checked>Noun
					<{/if}>
				<{else if $count_vorn eq 2}>
					<input type="checkbox" name="vorn[]" value="V" checked>Verb
					<input type="checkbox" name="vorn[]" value="N" checked>Noun
				<{/if}>
				</p>
			</div>
			<div id='4type_group'>
			<li>terminology/int’l law/foreign law/social term<br>
			<p>
				<{if $TIFS_res[0] eq "T"}>
					<input type="checkbox" name="type_group[]" value="T" checked>terminology
				<{else}>
					<input type="checkbox" name="type_group[]" value="T">terminology
				<{/if}>	

				<{if $TIFS_res[1] eq "I"}>
					<input type="checkbox" name="type_group[]" value="I" checked>int’l law
				<{else}>
					<input type="checkbox" name="type_group[]" value="I">int’l law
				<{/if}>
				
				<{if $TIFS_res[2] eq "F"}>
					<input type="checkbox" name="type_group[]" value="F" checked>foreign law
				<{else}>
					<input type="checkbox" name="type_group[]" value="F">foreign law
				<{/if}>
				<{if $TIFS_res[3] eq "S"}>
					<input type="checkbox" name="type_group[]" value="S" checked>social term
				<{else}>
					<input type="checkbox" name="type_group[]" value="S">social term
				<{/if}>					
			</p>
			</div>
			
			<div id='overlapped_group'>
			<li>Overlap
				<input type='button' class="btn btn-info btn-mini" value='+' id='addover' onclick="Addover();">
				<br>
				<div id="overlapped_1">
				<{if $res_count[3] eq 0}>
					<input type="text" name="overlapped_1" style="height: 30px;" value="<{$taiwan['overlapped']}>">
				<{else}>
					<{for $num=1 to $res_count[3]}>
						<input type="text" name="overlapped_<{$num}>" style="height: 30px;"  value="<{$res_over[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>
			
			<div id='compound_group'>			
			<li>Compound
				<input type='button' class="btn btn-info btn-mini" value='+' id='addcompound' onclick="Addcompound();">
				<br>
				<div id="compound_1">
				<{if $res_count[4] eq 0}>
					<input type="text" name="compound_1" style="height: 30px;" value="<{$taiwan['compound']}>">
				<{else}>
					<{for $num=1 to $res_count[4]}>
						<input type="text" name="compound_<{$num}>" style="height: 30px;"  value="<{$res_compound[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>		
			
			<div id='existing_or_old'>
			<li>Old law<br>
				<input type="text" name="existing_or_old_law" style="height: 30px;" value="<{$taiwan['existing_or_old_law']}>">
			</div>
			
			<div id='source_group'>
			<li>Source
				<input type='button' class="btn btn-info btn-mini" value='+' id='addscr' onclick="Addsource();">
				<div id="source_1">
				<br>
				<{if $res_count[6] eq 0}>
					<input type="text" name="source_1" style="height: 30px;" value="<{$taiwan['source']}>">
				<{else}>
					<{for $num=1 to $res_count[6]}>
						<input type="text" name="source_<{$num}>" style="height: 30px;"  value="<{$res_source[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>
			
			<div id='comment_group'>
			<li>Comment
				<input type='button' class="btn btn-info btn-mini" value='+' id='addcomment' onclick="Addcomment();">
				<div id='comment_1'>
				<br>
				<{if $res_count[7] eq 0}>
					<input type="text" name="comment_1" style="height: 30px;" value="<{$taiwan['comment']}>">
				<{else}>
					<{for $num=1 to $res_count[7]}>
						<input type="text" name="comment_<{$num}>" style="height: 30px;"  value="<{$res_comment[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>

			<div id='toenglish_group'>
			<li>Traditional chinese to English
				<input type='button' class="btn btn-info btn-mini" value='+' id='addtoEN' onclick="AddtoEN();">
				<br>				
				<div id='toenglish_1'>
				<{if $res_count[8] eq 0}>
					<input type="text" name="traditonalchinese_to_english_1" style="height: 30px;"  value="<{$taiwan['traditonalchinese_to_english']}>">
				<{else}>
					<{for $num=1 to $res_count[8]}>
						<input type="text" name="traditonalchinese_to_english_<{$num}>" style="height: 30px;"  value="<{$res_toenglish[($num-1)]}>"><br>
					<{/for}>
				<{/if}>
				</div>
			</div>	
		</ul>
		<input type="hidden" name="china" value="<{$china['china']}>" />
		<input type="hidden" name="china_statutory" value="<{$china['china_statutory']}>" />
		<input type="hidden" name="china_equivalent" value="<{$china['china_equivalent']}>" />
		<input type="hidden" name="china_equivalent_statutory" value="<{$china['china_equivalent_statutory']}>" />
		<input type="hidden" name="china_to_english" value="<{$china['china_to_english']}>" />
		
		<input type="hidden" name="japanese" value="<{$japan['japanese']}>" />
		<input type="hidden" name="japanese_statutory" value="<{$japan['japanese_statutory']}>" />
		<input type="hidden" name="japanese_equivalent" value="<{$japan['japanese_equivalent']}>" />
		<input type="hidden" name="japanese_equivalent_statutory" value="<{$japan['japanese_equivalent_statutory']}>" />
		<input type="hidden" name="japanese_to_english" value="<{$japan['japanese_to_english']}>" />
		
		<input type="hidden" name="korean" value="<{$korea['korean']}>" />
		<input type="hidden" name="korean_to_chinese" value="<{$korea['korean_to_chinese']}>" />
		<input type="hidden" name="korean_statutory" value="<{$korea['korean_statutory']}>" />		
		<input type="hidden" name="korean_equivalent" value="<{$korea['korean_equivalent']}>" />
		<input type="hidden" name="korean_equivalent_statutory" value="<{$korea['korean_equivalent_statutory']}>" />
		<input type="hidden" name="o_korean_to_english" value="<{$korea['o_korean_to_english']}>" />		
		<input type="hidden" name="e_korean_to_english" value="<{$korea['e_korean_to_english']}>" />
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true" style="height:40px;width:70px;" >Exit</button>
		<input type="submit" class="btn btn-primary" style="height:40px;width:70px;" name="submit" value="Submit">
		<input type="hidden" name="id" value=<{$taiwan['original_ID']}> />
	  </div>
	</div>
	</form>
</body>
</html>