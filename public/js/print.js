// JavaScript Document

$(document).ready(function(){
	$('#btnPrint').click( function() {
		window.print();
	});
	
	$('#btnExcel').click( function() {
		var fields = [];
		var data = [];
		
		$('.table tr').each(function() {
			var arr = [];
			var th = $(this).find('th');
			var td = $(this).find('td');
			
			if (th.length > 0) {
				th.each(function() { arr.push($(this).text()); });
				fields.push(arr);
			}
			
			if (td.length > 0) {
				td.each(function() { arr.push($(this).text()); });
				data.push(arr);
			}
		});
		
		$('input[name="fields"]').val(fields);
		$('input[name="data"]').val(data);
		
		$('#frmExcel').submit();
	});
});