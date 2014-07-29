<script type="text/javascript">
var chinese_counter = '<?php if($res_count[1]==0){echo ($res_count[1]+2);} else{echo ($res_count[1]+1);} ?>';
var equal_counter ='<?php if($res_count[2]==0){echo ($res_count[2]+2);} else{echo ($res_count[2]+1);} ?>';
var over_counter ='<?php if($res_count[3]==0){echo ($res_count[3]+2);} else{echo ($res_count[3]+1);} ?>';
var comp_counter='<?php if($res_count[4]==0){echo ($res_count[4]+2);} else{echo ($res_count[4]+1);} ?>';
var type_counter='<?php if($res_count[5]==0){echo ($res_count[5]+2);} else{echo ($res_count[5]+1);} ?>';
var source_counter ='<?php if($res_count[6]==0){echo ($res_count[6]+2);} else{echo ($res_count[6]+1);} ?>';
var comment_counter='<?php if($res_count[7]==0){echo ($res_count[7]+2);} else{echo ($res_count[7]+1);} ?>';
var  toen_counter='<?php if($res_count[8]==0){echo ($res_count[8]+2);} else{echo ($res_count[8]+1);} ?>';

  function Addchinese() 
	{	
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'chinese_traditional_' + chinese_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="chinese_traditionalshape_' + chinese_counter + 
	      '" id="chinese_traditionalshape_'+ chinese_counter + '">');
		newTextBoxDiv.appendTo("#chinese_traditional_group"); 
		chinese_counter++;
	}
  function Addequal() 
	{	
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'equivalent_' + equal_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="chinese_equivalent_' + equal_counter + 
	      '" id="chinese_equivalent_'+ equal_counter + '">');
		newTextBoxDiv.appendTo("#equivalent_group"); 
		equal_counter++;
	}
  function Addover()
	{
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'overlapped_' + over_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="overlapped_' + over_counter + 
	      '" id="overlapped_'+ over_counter + '">');
		newTextBoxDiv.appendTo("#overlapped_group"); 
		over_counter++;
	}
  function Addcompound()
	{
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'compound_' + comp_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="compound_' + comp_counter + 
	      '" id="compound_'+ comp_counter + '">');
		newTextBoxDiv.appendTo("#compound_group"); 
		comp_counter++;
	}
  function Addtype()
  {
		var newTextBoxDiv = $(document.createElement('div')).attr("id", '4type_' + type_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="4type_' + type_counter + 
	      '" id="4type_'+ type_counter + '">');
		newTextBoxDiv.appendTo("#4type_group"); 
		type_counter++;
  }
  function Addsource()
  {
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'source_' + source_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="source_' + source_counter + 
	      '" id="source_'+ source_counter + '">');
		newTextBoxDiv.appendTo("#source_group"); 
		source_counter++;
  }
  function Addcomment()
  {
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'comment_' + comment_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="comment_' + comment_counter + 
	      '" id="comment_'+ comment_counter + '">');
		newTextBoxDiv.appendTo("#comment_group"); 
		comment_counter++;
  }
  function AddtoEN()
  {
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'traditonalchinese_to_english_' + toen_counter);
		newTextBoxDiv.after().html(
	      '<input type="text" style="height: 30px;" name="traditonalchinese_to_english_' + toen_counter + 
	      '" id="traditonalchinese_to_english_'+ toen_counter + '">');
		newTextBoxDiv.appendTo("#toenglish_group"); 
		toen_counter++;
  }
</script>
