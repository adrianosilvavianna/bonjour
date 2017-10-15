var map;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();

function initialize() {	
	directionsDisplay = new google.maps.DirectionsRenderer();
	var latlng = new google.maps.LatLng(-25.427778, -49.273046);
	
    var options = {
        zoom: 5,
		center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map(document.getElementById("mapa"), options);
	directionsDisplay.setMap(map);
	directionsDisplay.setPanel(document.getElementById("trajeto-texto"));
	
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function (position) {

			pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.setCenter(pontoPadrao);
			
			var geocoder = new google.maps.Geocoder();
			
			geocoder.geocode({
				"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					$("#txtEnderecoPartida").val(results[0].formatted_address);
				}
            });
		});
	}
}

initialize();



$("form").submit(function(event) {
	event.preventDefault();

	var enderecoPartida = $("#txtEnderecoPartida").val();
	var enderecoChegada = $("#txtEnderecoChegada").val();
	var date_exit = $("#date").val();
	var time = $("#time").val();
	var vehicle = $("#vehicle_id").val();
	var action = $(this).attr("action");


	alert("saindo : "+enderecoPartida+" Destino :"+ enderecoChegada+" Data :"+date_exit+" Tempo: "+time+" Veiculo :"+vehicle);

	if(enderecoChegada == '' || enderecoPartida == '' || date_exit == '' || time == ''){

		alert("Preencha todos os campos corretamente");

	}

	var dataApi = {
		origin: enderecoPartida,
		destination: enderecoChegada,
		travelMode: google.maps.TravelMode.DRIVING
	};

	var request = {
		arrival_address: enderecoPartida,
		exit_address: enderecoChegada,
		date: date_exit,
		time: time,
		vehicle_id: vehicle

	}

	console.log(request);

	$.post(action, request, function (xhr) {

	})
		.done(function (xhr) {
			alert('foi');

			//$('#like_count_' + xhr.data.id).html(xhr.data.likes);
		})
		.fail(function () {

			alert('error');
			//var errors = xhr.responseJSON.errors;
			//console.log(errors)
		})
		.always(function (xhr) {

	});


	directionsService.route(dataApi, function(result, status) {
		if (status == google.maps.DirectionsStatus.OK) {
			directionsDisplay.setDirections(result);
		}
	});

});