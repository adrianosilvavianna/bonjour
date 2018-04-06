$('form').submit(function(){
    event.preventDefault();

    var data = {
        name: $("#name").val(),
        age: $("#age").val(),
        phone: $("#phone").val(),
        genre: $("#genre").val(),
        photo_address: $("#photo_address").val(),
        about: $("#about").val(),
    };

    var url = $(this).attr('action');
    console.log(data);
    console.log(url);

    $.post(url, data, function(response) {
        console.log(response)
    })
        .done(function(data) {
            swal({
                title: "Muito Bom!",
                text: "Cadastro realizado com sucesso!",
                icon: "success"
            });
        })
        .fail(function(error) {

            var array_data = error["responseJSON"].errors;
            console.log(array_data);

            $("#error_name").html(array_data.name);
            $("#error_email").html(array_data.email);
            $("#error_phone").html(array_data.phone);
            $("#error_message").html(array_data.message);

        })
        .always(function() {

        });

});