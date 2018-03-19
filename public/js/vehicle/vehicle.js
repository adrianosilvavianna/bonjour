$(document).ready(function()
{
    var name_marca= '';
    var name_modelo = '';
    $('#plaque').mask('AAA-0000');


    $("#color").select2();
    //inicia select marca
    $('#marcas').select2({
        placeholder: 'Marcas', data: getMarcas()
    })
        .on("change", function(e) {
            var id_marca    = ($(this).select2('val'));
            name_marca  = ($('#marcas option:selected').text());
            console.log(name_marca);

            getModelos(id_marca);
        });

    //inicia select modelos
    $('#modelos').select2({ placeholder: 'Modelos' })
        .on("change", function(e) {
            var id_modelo    = ($(this).select2('val'));
            name_modelo    = ($('#modelos option:selected').text());

            console.log(name_modelo);

        });

    //retorna todas as marcas
    function getMarcas(){

        var marcas   = {};

        $.ajax({
            url: "https://fipe.parallelum.com.br/api/v1/carros/marcas",
            async: false,
            dataType: 'json',
            success: function(data) {
                results = data.map(function(item) {
                    console.log(item.nome);
                    return { id: item.codigo, text: item.nome,  };
                });
                marcas = results;
            }
        });
        console.log(marcas);
        return marcas
    }
    //retorna modelos referente a marca solicitada
    function getModelos(marca){

        console.log(marca);

        var modelos  = {};

        var request = new XMLHttpRequest();

        request.open('GET', 'https://fipe.parallelum.com.br/api/v1/carros/marcas/'+marca+'/modelos');

        request.onreadystatechange = function() {
            if((request.readyState) === 4 && (request.status === 200)) {

                var models = JSON.parse(request.responseText).modelos;

                console.log(models);

                results = models.map(function(item) {
                    return { id: item.codigo, text: item.nome };
                });
                //console.log(results);
                console.log(results);
                $("#modelos").empty();
                $('#modelos').select2({ data: results });

            }
        };
        request.send();

    }

    $( "#form-vehicle" ).submit(function(){
        event.preventDefault();
        $.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });

        var parm = {
            brand: name_marca,
            model: name_modelo,
            color: $("#color").val(),
            plaque: $("#plaque").val(),
            year: $("#year").val(),
            num_passenger: $("#num_passenger").val()
        };
        console.log(parm);

        $.ajax({
            type: 'POST',
            url: '/user/vehicle/store',
            data: parm,
            success: function(data) {
                $("#form-vehicle input").val("");
                $.unblockUI();
                $.notify({
                    title: 'Sucesso',
                    message: data.message,
                },{
                    type: 'success',
                });

                window.setTimeout(function(){
                    window.location = "/user/vehicle";
                }, 1500);
            },
            error: function (error) {
                console.log(error);
                $.unblockUI();
                $.notify({
                    title: 'Error',
                    message: error.message,
                },{
                    type: 'danger',
                });
            }
        });

    });

});