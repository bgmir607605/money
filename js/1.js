function addOperation(){
	var date = $("#date").val();
	var description = $("#description").val();
	var value = $("#value").val();
	$.ajax({
			async: false,			
			type: "POST",
			url: "./ajax/addOperation.php",
			data: 'date=' + date +'&description=' + description + '&value=' + value,
			dataType:"text",
			error: function () {	
				alert( "Ошибка" );
			},
			success: function (response) {
				showOperations();
				showAccaunts();
				$("#description").val('');
				$("#value").val('');
				$('#description').focus();
			}
	});
}

function onLoad(){
	var now = new Date();
	var month = now.getMonth() + 1;
	showOperations(month);
	showAccaunts();
	setupDate();
}

//Выводит список экземляров сущности из БД
function showOperations(month) {
	$.ajax({
			async: false,			
			type: "POST",
			url: "./ajax/showOperations.php",
			data: 'month=' + month,
			dataType:"text",
			error: function () {	
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#operations').html(response);
			}
	});

}

function showAccaunts() {
	$.ajax({
			async: false,			
			type: "POST",
			url: "./ajax/showAccaunts.php",
			dataType:"text",
			error: function () {	
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#accaunts').html(response);
			}
	});

}

function setupDate(){
	var now = new Date();
	var year =  now.getFullYear();
	var month = now.getMonth() + 1;
	if (month < 10) {month = '0' + month;} 
	var date = now.getDate();
	if (date < 10) {date = '0' + date;}
	$('#date').val(year + '-' + month + '-' + date);
}
