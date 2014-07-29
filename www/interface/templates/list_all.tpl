<html>
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
			
			<{foreach from=$list_all item=each_data}>
			<tr>
				<{foreach from=$each_data item=data_context}>
					<td><{$data_context}></td>			
				<{/foreach}>
				<!--<td><a href="show_detail.php?id=<{$each_data['original_ID']}>" target="_blank">Click</a></td>-->
			</tr>
			<{/foreach}>
			
		</tbody></table>
	</div>
	
</body>
</html>