
function show(divname)
{
	$("#"+divname).toggle();
}
$(document).ready(init); /*畫面上所有的DOM都載入後*/
function init() 
{
	/*選擇ALL的show case*/
	$.fn.showAll = function (counrty)
	{
		var japan_isChecked = $('#japan_all').is(':checked');
		var korea_isChecked = $('#korea_all').is(':checked');
		var taiwan_isChecked = $('#taiwan_all').is(':checked');
		var china_isChecked = $('#china_all').is(':checked');
        
		if(counrty == 'japan')//japan
		{
			if(japan_isChecked == true)
			{
				$('thead  #japan').show();
				$('thead  #japan').attr("colSpan",5);
				for (count = 2; count < 7; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')',this).show();
				}
			}
			else if(japan_isChecked == false)
			{
				$('thead  #japan').hide();
				$('thead  #japan').attr("colSpan",0);
				for (count = 2; count < 7; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')',this).hide();
				}	
			}		
		}
		else if (counrty == 'korea')//korea
		{
			if(korea_isChecked == true)
			{
				$('thead  #korea').show();
				$('thead  #korea').attr("colSpan",7);
				for (count = 7; count < 14; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).show();
				}
			}
			else if(korea_isChecked == false)
			{
				$('thead  #korea').hide();
				$('thead  #korea').attr("colSpan",0);
				for (count = 7; count < 14; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).hide();
				}	
			}			
		}
		else if (counrty == 'taiwan')//taiwan
		{
			if(taiwan_isChecked == true)
			{
				$('thead  #taiwan').show();
				$('thead  #taiwan').attr("colSpan",5);
				for (count = 14; count < 19; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).show();
				}
			}
			else if(taiwan_isChecked == false)
			{
				$('thead  #taiwan').hide();
				$('thead  #taiwan').attr("colSpan",0);
				for (count = 14; count < 19; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).hide();
				}	
			}			
		}
		
		else if (counrty == 'china')//china
		{
			if(china_isChecked == true)
			{
				$('thead  #china').show();
				$('thead  #china').attr("colSpan",5);
				for (count = 19; count < 24; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).show();
				}
			}
			else if(china_isChecked == false)
			{
				$('thead  #china').hide();
				$('thead  #china').attr("colSpan",0);
				for (count = 19; count < 24; count++)
				{
					$('tbody tr td:nth-child('+ count +'),tbody tr th:nth-child('+ count +')', this).hide();
				}	
			}			
		}		

	}
	
	/*註冊removeCol函數*/
	$.fn.removeCol = function (col) 
	{
		// Make sure col has value
		var japan_checked = $('#japan_option :checkbox:checked').length;
		var korea_checked = $('#korea_option :checkbox:checked').length;
		var taiwan_checked = $('#taiwan_option :checkbox:checked').length;
		var china_checked = $('#china_option :checkbox:checked').length;
		//alert(col);	
		if (!col) { col = 1; }
		if(1<col && col<7) //japan
		{
			//alert(456);
			if(japan_checked >0)
			{
				$('thead  #japan').show();
				$('thead  #japan').attr("colSpan",japan_checked);
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}
			else
			{
				//alert(123);
				$('thead  #japan').hide();
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}	
		}
		else if(6<col && col<14)//k
		{
			//alert(123);
			if(korea_checked >0)
			{
				$('thead  #korea').show();
				//alert(123);
				$('thead  #korea').attr("colSpan",korea_checked);
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}
			else
			{
				$('thead  #korea').hide();
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}		
		}
		else if(13<col && col<19)//t
		{
			if(taiwan_checked >0)
			{
				$('thead  #taiwan').show();
				//alert(123);
				$('thead  #taiwan').attr("colSpan",taiwan_checked);
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}
			else
			{
				$('thead  #taiwan').hide();
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}		
		}
		else//c
		{
			if(china_checked >0)
			{
				$('thead  #china').show();
				//alert(123);
				$('thead  #china').attr("colSpan",china_checked);
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}
			else
			{
				$('thead  #china').hide();
				$('tbody tr td:nth-child(' + col + '),tbody tr th:nth-child(' + col + ')', this).toggle();/*該欄隱藏*/
			}
		}
		return this;
	

	};

}

			
$(document).ready(function() {
    $('#china_all').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.china_group').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "china_group"               
            });
        }else{
            $('.china_group').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "china_group"                       
            });         
        }
    });
    $('#japan_all').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.japan_group').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "china_group"               
            });
        }else{
            $('.japan_group').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "china_group"                       
            });         
        }
    });
	$('#korea_all').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.korea_group').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "china_group"               
            });
        }else{
            $('.korea_group').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "china_group"                       
            });         
        }
    });
	$('#taiwan_all').click(function(event) {  //on click 
        if(this.checked) { // check select status
            $('.taiwan_group').each(function() { //loop through each checkbox
                this.checked = true;  //select all checkboxes with class "china_group"               
            });
        }else{
            $('.taiwan_group').each(function() { //loop through each checkbox
                this.checked = false; //deselect all checkboxes with class "china_group"                       
            });         
        }
    });
	//在All打勾的情況下，如果取消其他checkbox 則取消ALL
	$('.japan_group').click(function(event) 
	{
		var isChecked = $('#japan_all').is(':checked');
		//alert(japan_isChecked);
		if(isChecked == true)
		{
			$('#japan_all').checked = false;
			document.getElementById("japan_all").checked = false;
		} 
	});

	$('.korea_group').click(function(event) 
	{
		var isChecked = $('#korea_all').is(':checked');
		if(isChecked == true)
		{
			$('#korea_all').checked = false;
			document.getElementById("korea_all").checked = false;
		} 
	});

	$('.taiwan_group').click(function(event) 
	{
		var isChecked = $('#taiwan_all').is(':checked');
		if(isChecked == true)
		{
			$('#taiwan_all').checked = false;
			document.getElementById("taiwan_all").checked = false;
		} 
	});
	
	$('.china_group').click(function(event) 
	{
		var isChecked = $('#china_all').is(':checked');
		if(isChecked == true)
		{
			$('#china_all').checked = false;
			document.getElementById("china_all").checked = false;
		} 
	});

});