function addExpenses(){

	title = $("#giderBaslik").val();
	type = $('#giderTur').val();
	amount = $("#giderMiktar").val();
	description = $("#giderAciklama").val();
	date = $("#giderTarih").html();
	data = {type:type,amount:amount,title:title,description:description,date:date}
	$.ajax({
	    url: "islemler/gider",
	    type: "POST",
	    data: {data : data} ,
	    success: function (item) {
	    	$("#giderBaslik").empty();
			$('#giderTur').empty();
			$("#giderMiktar").empty();
			$("#giderAciklama").empty();
	    	location.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}
function addExpensesType(){

	title = $("#giderTuruBaslik").val();
	type = $("#giderTuru").val();
	owner = $("#giderTuruSahibi").val();
	data = {title:title,type:type,owner:owner}
	$.ajax({
	    url: "islemler/giderTuru",
	    type: "POST",
	    data: {data : data} ,
	    success: function (item) {
	    	$("#giderTuruBaslik").empty();
	    	location.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function addIncomes(){

	title = $("#gelirBaslik").val();
	type = $('#gelirTur').val();
	amount = $("#gelirMiktar").val();
	description = $("#gelirAciklama").val();
	date = $("#gelirTarih").html();
	data = {type:type,amount:amount,title:title,description:description,date:date}
	
	$.ajax({
	    url: "islemler/gelir",
	    type: "POST",
	    data: {data : data} ,
	    success: function (item) {
	    	location.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function addIncomesType(){

	title = $("#gelirTuruBaslik").val();
	type = $("#gelirTuru").val();
	owner = $("#gelirTuruSahibi").val();
	data = {title:title,type:type,owner:owner}
	$.ajax({
	    url: "islemler/gelirTuru",
	    type: "POST",
	    data: {data : data} ,
	    success: function (item) {
	    	$("#gelirTuruBaslik").empty();
	    	location.reload();
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function ajaxGelirler(){
	$.ajax({
	    url: "gelirler",
	    type: "GET",
	    success: function (item) {
	    	$("#gelirler").empty();
	        $("#gelirler").html(item);
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}

function ajaxGiderler(){
	$.ajax({
	    url: "giderler",
	    type: "GET",
	    success: function (item) {
	    	$("#giderler").empty();
	        $("#giderler").html(item);
	    },
	    error: function(jqXHR, textStatus, errorThrown) {
	       console.log(textStatus, errorThrown);
	    }
	});
}