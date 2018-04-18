		var map;
		var geocoder;

		var marker, directionsDisplay, directionsService

		function initialize() {

            directionsService = new google.maps.DirectionsService();
			directionsDisplay = new google.maps.DirectionsRenderer();
			var latlng = new google.maps.LatLng(-25.427778, -49.273046);

			var options = {
				zoom: 5,
				center: latlng,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};

			map = new google.maps.Map(document.getElementById("mapa"), options);
			geocoder = new google.maps.Geocoder();

			marker = new google.maps.Marker({
				map: map,
				draggable: true,
			});

			directionsDisplay.setMap(map);
			directionsDisplay.setPanel(document.getElementById("trajeto-texto"));

			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function (position) {

					pontoPadrao = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					map.setCenter(pontoPadrao);


					geocoder.geocode({
							"location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
						},
						function (results, status) {
							if (status == google.maps.GeocoderStatus.OK) {
								$("#txtEnderecoPartida").val(results[0].formatted_address);
							}
						});
				});
			}
		}

		initialize();

		function carregarNoMapaPartida(endereco) {
			geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();

						$('#txtEnderecoPartida').val(results[0].formatted_address);
						$('#txtLatitude').val(latitude);
						$('#txtLongitude').val(longitude);

						var location = new google.maps.LatLng(latitude, longitude);
						marker.setPosition(location);
						map.setCenter(location);
						map.setZoom(16);
					}
				}
			})
		}

		$("#txtEnderecoPartida").blur(function() {
			if($(this).val() != "")
				carregarNoMapaPartida($(this).val());
		});

		google.maps.event.addListener(marker, 'drag', function () {
			geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						$('#txtEnderecoPartida').val(results[0].formatted_address);
						$('#txtLatitude').val(marker.getPosition().lat());
						$('#txtLongitude').val(marker.getPosition().lng());
					}
				}
			});
		});

		$("#txtEnderecoPartida").autocomplete({
			source: function (request, response) {
				geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
					response($.map(results, function (item) {

						return {
							label: item.formatted_address,
							value: item.formatted_address,
							latitude: item.geometry.location.lat(),
							longitude: item.geometry.location.lng()
						}
					}));
				})
			},
			select: function (event, ui) {
				$("#txtLatitude").val(ui.item.latitude);
				$("#txtLongitude").val(ui.item.longitude);
				var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
				marker.setPosition(location);
				map.setCenter(location);
				map.setZoom(16);
			}
		});


		/////////////////////////////////////////////////////////////// Segunda localização ////////////////////////////////////////////

		function carregarNoMapaChegada(endereco) {
			geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						var latitude = results[0].geometry.location.lat();
						var longitude = results[0].geometry.location.lng();

						$('#txtEnderecoChegada').val(results[0].formatted_address);
						$('#txtLatitude').val(latitude);
						$('#txtLongitude').val(longitude);

						var location = new google.maps.LatLng(latitude, longitude);
						marker.setPosition(location);
						map.setCenter(location);
						map.setZoom(16);
					}
				}
			})
		}

		$("#txtEnderecoChegada").blur(function() {
			if($(this).val() != "")
				carregarNoMapaChegada($(this).val());
		});

		google.maps.event.addListener(marker, 'drag', function () {
			geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
				if (status == google.maps.GeocoderStatus.OK) {
					if (results[0]) {
						$('#txtEnderecoChegada').val(results[0].formatted_address);
						$('#txtLatitude').val(marker.getPosition().lat());
						$('#txtLongitude').val(marker.getPosition().lng());
					}
				}
			});
		});

		$("#txtEnderecoChegada").autocomplete({
			source: function (request, response) {
				geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
					response($.map(results, function (item) {

						return {
							label: item.formatted_address,
							value: item.formatted_address,
							latitude: item.geometry.location.lat(),
							longitude: item.geometry.location.lng()
						}
					}));
				})
			},
			select: function (event, ui) {
				$("#txtLatitude").val(ui.item.latitude);
				$("#txtLongitude").val(ui.item.longitude);
				var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
				marker.setPosition(location);
				map.setCenter(location);
				map.setZoom(16);
			}
		});



		$("#btnEnviar").click(function (event) {
			event.preventDefault();
			$.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });

			var enderecoPartida = $("#txtEnderecoPartida").val();
			var enderecoChegada = $("#txtEnderecoChegada").val();

			var dataApi = {
				origin: enderecoPartida,
				destination: enderecoChegada,
				travelMode: google.maps.TravelMode.DRIVING
			};

			directionsService.route(dataApi, function (result, status) {
				$.unblockUI();
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(result);
				}
			});

		});

		$("form").submit(function (event) {
			event.preventDefault();
			$.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });

			var enderecoPartida = $("#txtEnderecoPartida").val();
			var enderecoChegada = $("#txtEnderecoChegada").val();
			var date_exit = $("#date").val();
			var time = $("#time").val();
			var vehicle = $("#vehicle_id").val();
			var num_passenger = $("#num_passenger").val();
			var action = $(this).attr("action");


			//alert("saindo : " + enderecoPartida + " Destino :" + enderecoChegada + " Data :" + date_exit + " Tempo: " + time + " Veiculo :" + vehicle);

			if (enderecoChegada == '' || enderecoPartida == '' || date_exit == '' || time == '' || num_passenger == '') {
				$.unblockUI();
				$.notify({
					title: 'Error',
					message: 'Algo está errado, verifique se os campos estão preenchidos corretamente',
				},{
					type: 'danger',
				});
				finish();

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
				vehicle_id: vehicle,
				num_passenger: num_passenger,

			}

			console.log(request);

			$.post(action, request, function (xhr) {

			})
				.done(function (xhr) {
					$.unblockUI();
					$.notify({
						title: 'Sucesso',
						message: 'Obrigado por disponibilizar uma viagem.',
					},{

						type: 'success',
					});
					console.log(xhr);
					window.setTimeout(function(){
						window.location = "/user/trip";
					}, 1500);

				})
				.fail(function () {
					$.unblockUI();
					$.notify({
						title: 'Error',
						message: 'Algo está errado, verifique se os campos estão preenchidos corretamente',
					},{
						type: 'danger',
					});

					var errors = xhr.responseJSON.errors;
					console.log(errors)
				})
				.always(function (xhr) {

				});


			directionsService.route(dataApi, function (result, status) {
				if (status == google.maps.DirectionsStatus.OK) {
					directionsDisplay.setDirections(result);
				}
			});

		});
