	$(function(){
		// 設定每頁 5 筆, 預設顯示第 1 頁, 每頁選項只有  5,10
		// 並且把分頁導航列放在表格上方
		$('#menuTable').tablePagination({
			rowsPerPage : 5,
			currPage : 1, 
			optionsForRows : [5,10],
			topNav : true
		});
	});
