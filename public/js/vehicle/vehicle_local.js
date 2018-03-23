var name_marca= '';
var name_modelo = '';
$("#color").select2();
$('#plaque').mask("AAA-00");

//inicia select marca
$('#marcas').select2({
    placeholder: 'Marcas', data: getMarcas()
})
    .on("change", function(e) {
        var id_marca    = ($(this).select2('val'));
        showModelos(id_marca);
    });

//inicia select modelos
$('#modelos').select2({ placeholder: 'Modelos' });

//retorna todas as marcas
function getMarcas(){

    var marcas   = {};
    $.ajax({
        url: "http://localhost:8000/user/vehicle/getBrand",
        async: false,
        dataType: 'json',
        success: function(data) {

            results = data.data.map(function(item) {
                return { id: item.make, text: item.make, };
            });
            marcas = results;
        }
    });
    return marcas
}
//retorna modelos referente a marca solicitada
function getModelos(marca){

    var modelos  = {};

    $.ajax({
        url: "http://localhost:8000/user/vehicle/getModel?brand="+marca,
        async: false,
        success: function(data) {

            results = data.data.map(function(item) {
                return { id: item.model, text: item.model, };
            });
            modelos = results;
        }
    });
    return modelos;
}

//exibi na tela os modelos
function showModelos(marca) {

    $("#modelos").empty();
    $('#modelos').select2({ data: getModelos(marca) });
}