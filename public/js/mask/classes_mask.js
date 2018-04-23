$(document).ready(function() {

    $('.plaque').mask("AAA-0000");
    $('.cell_phone').mask('(00) 00000-0000');
    $('.phone').mask('(00) 0000-0000');
    $('.cpf').mask('000.000.000-00');
    $('.cep').mask('00000-000');
    $('.cnpj').mask('00.000.000/0000-00');
    $('.rg').mask('00.000.000-00');
    $('.money').mask("#.##0,00", {reverse: true});
    $('.percent').mask('##0,00%', {reverse: true});
    $('.placeholder_date').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
                pattern: /[\/]/,
                fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});

});