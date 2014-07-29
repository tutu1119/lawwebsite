<script type="text/javascript">
var counter = 2;
var counter1 = '<?php echo $he; ?>';
document.write(he);
  alert(counter1);
$(document).ready(function(){
 
     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }   
 
	counter--;
 
        $("#TextBoxDiv" + counter).remove();
 
     });
 
     $("#getButtonValue").click(function () {
 
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += $('#textbox' + i).val()+"\t"+$('#type' + i).val()+"\t";
	}
    	  //alert(msg);
		 
		  document.getElementById("getvalue").value=msg;
		   //document.getElementById("form_content").submit();
     });
	 

 
	
	 
  }

  );
  
  function Add(textname) 
	{		
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
		newTextBoxDiv.after().html('<label>'+counter+'.	Field name  : </label>' +
	      '<input type="text" name="' + textname+ counter + 
	      '" id="' + textname + counter + '" value="" >');
		newTextBoxDiv.appendTo("#TextBoxesGroup"); 
		counter++;
	}
  function Add1(textname) 
	{		
		var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDivXD' + counter1);
		newTextBoxDiv.after().html('<label>'+counter1+'.	Field name  : </label>' +
	      '<input type="text" name="' + textname+ counter1 + 
	      '" id="' + textname + counter1 + '" value="" >');
		newTextBoxDiv.appendTo("#TextBoxesGroup1"); 
		counter1++;
	}
</script>