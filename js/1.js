var curYear;
var curMonth;
function addOperation(){
	var date = $("#date").val();
	var description = $("#description").val();
	var value = $("#value").val();
	var accaunt = $("#accaunt").val();
	var category = $("#categoryOfAmount").val();
	/*
	Дата
	Сумма
	Описание
	Счёт с которого списываем
	Категория
	*/
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/addOperation.php",
			data: 'date=' + date +'&description=' + description + '&value=' + value + '&accaunt=' + accaunt + '&category=' + category,
			dataType:"text",
			error: function () {
				alert( "Ошибка" );
			},
			success: function (response) {
				showOperations(curYear, curMonth);
				showAccaunts();
				$("#description").val('');
				$("#value").val('');
				$("#categoryOfAmount").html('');
				$('#value').focus();
			}
	});
}

function showDate(){
	var date = new Date($('#date').val());
	var year =  date.getFullYear();
	var month = date.getMonth() + 1;
	if ((year != curYear) | (month != curMonth)){
		showOperations(year, month);
		drawChart(year, month);
		curYear = year;
		curMonth = month;
	};
}

function onLoad(){
	var now = new Date();
	curYear =  now.getFullYear();
	curMonth = now.getMonth() + 1;
	showOperations(curYear, curMonth);
	showTransfers(curYear, curMonth);
	showAccaunts();
	setupDate();
	getAccauntsList();
}

//Выводит список экземляров сущности из БД
function showOperations(year, month) {
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/showOperations.php",
			data: 'year=' + year + '&month=' + month,
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

function getAccauntsList(){
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/getAccauntsList.php",
			dataType:"text",
			error: function () {
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#accaunt').html(response);
				$('#src').html(response);
				$('#dst').html(response);
			}
	});
}

function editSum(){
	//alert($('#value').val());
	if ($('#value').val() > 0){
		$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/getCategoryList.php",
			data: 'direct=income',
			dataType:"text",
			error: function () {
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#categoryOfAmount').html(response);
				$('#direct').html('На счёт');
			}
		});

	}
	if ($('#value').val() < 0){
		$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/getCategoryList.php",
			data: 'direct=expense',
			dataType:"text",
			error: function () {
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#categoryOfAmount').html(response);
				$('#direct').html('Со счёта');
			}
		});
	}
}

function addTransfer(){
	var date = $("#date").val(); // Когда
	var src = $("#src").val(); // Откуда
	var dst = $("#dst").val(); // Куда
	var amountOfTransfer = $("#amountOfTransfer").val(); // Сколько

	var ajaxData;
	ajaxData = 'date=' + date + '&src=' + src + '&dst=' + dst + '&amountOfTransfer=' + amountOfTransfer;
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/addTransfer.php",
			data: ajaxData,
			dataType:"text",
			error: function () {
				alert( "Ошибка" );
			},
			success: function (response) {
				showAccaunts();
				showTransfers(curYear, curMonth);
				$("#src").val('');
				$("#dst").val('');
				$("#amountOfTransfer").val('');
			}
	});
}

function showTransfers(year, month) {
	$.ajax({
			async: false,
			type: "POST",
			url: "./ajax/showTransfers.php",
			data: 'year=' + year + '&month=' + month,
			dataType:"text",
			error: function () {
				alert( "При считывании флага обновления произошла ошибка" );
			},
			success: function (response) {
				$('#transfers').html(response);
			}
	});

}
