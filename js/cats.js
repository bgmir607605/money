function addCat(){
	var catName = $("#catName").val();
	var direct = $("#direct").val();
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/addCat.php",
			data: 'name=' + catName +'&direct=' + direct,
			dataType:"text",
			error: function () {
				alert( "Ошибка" );
			},
			success: function (response) {
				showCats();
				$("#catName").val('');
				$("#direct").val('');
				$('#catName').focus();
			}
	});
}

function showCats() {
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/showCats.php",
			dataType:"text",
			error: function () {
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#cats').html(response);
			}
	});



}