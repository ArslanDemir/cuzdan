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