var name_marca= '';
var name_modelo = '';
$("#color").select2();

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
        url: "https://fipeapi.appspot.com/api/1/carros/marcas.json",
        async: false,
        dataType: 'json',
        success: function(data) {
            results = data.map(function(item) {
                return { id: item.id, text: item.name };
            });
            marcas = results;
        }
    });
    return marcas
}
//retorna modelos referente a marca solicitada
function getModelos(marca){

    var marca    = marca+'.json';
    var modelos  = {};

    $.ajax({
        url: "https://fipeapi.appspot.com/api/1/carros/veiculos/"+marca,
        async: false,
        success: function(data) {

            results = data.map(function(item) {
                return { id: item.id, text: item.name, };
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