@section('css')

    @show

<div class="row">

    <div class="stars">
        <input type="radio" name="star" class="star-1 rating" id="star-1" value="1"/>
        <label class="star-1" for="star-1">1</label>
        <input type="radio" name="star" class="star-2 rating" id="star-2" value="2"/>
        <label class="star-2" for="star-2">2</label>
        <input type="radio" name="star" class="star-3 rating" id="star-3" value="3"/>
        <label class="star-3" for="star-3">3</label>
        <input type="radio" name="star" class="star-4 rating" id="star-4" value="4"/>
        <label class="star-4" for="star-4">4</label>
        <input type="radio" name="star" class="star-5 rating" id="star-5" value="5"/>
        <label class="star-5" for="star-5">5</label>
        <span></span>
    </div>

    {{--<fieldset class="rating">--}}
        {{--<input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Nota 5 - Excelente"></label>--}}
        {{--<input type="radio"  name="rating" value="4.5" /><label class="half" for="star4half" title="Nota 4.5 - Muito Bom"></label>--}}
        {{--<input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Nota 4 - Otimo"></label>--}}
        {{--<input type="radio" id="star3half" name="rating" value="3.5" /><label class="half" for="star3half" title="Nota 3.5 - Pode Melhorar"></label>--}}
        {{--<input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Nota 3 - Bom"></label>--}}
        {{--<input type="radio" id="star2half" name="rating" value="2.5" /><label class="half" for="star2half" title="Nota 2.5 - Razoavel"></label>--}}
        {{--<input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Nota 2 - Nada Mal"></label>--}}
        {{--<input type="radio" id="star1half" name="rating" value="1.5" /><label class="half" for="star1half" title="Nota 1.5 - Ruim"></label>--}}
        {{--<input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Nota 1 - Muito Ruim"></label>--}}
        {{--<input type="radio" id="starhalf" name="rating" value="0.5" /><label class="half" for="starhalf" title="Nota 0.5 - Pessimo"></label>--}}
    {{--</fieldset>--}}


</div>

@section('scripts')

    <script>
        $("input:radio").click(function() {

            var form = $(this).closest('form');

            console.log(form.attr('action'));

            if (confirm('Tem certeza que deseja dar esta nota ?')) {
                $.blockUI({ message: '<div id="preloader"><div id="loader"></div></div>' });

                var url  = form.attr('action');
                var parm = {
                    nota: $(this).val()
                };

                alert(url);

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: parm,
                    success: function(data) {
                        $.unblockUI();
                        //$('form').data('form').hide();
                        $.notify({
                            title: 'Sucesso',
                            message: data.message,
                        },{
                            type: 'success',
                        });
                    },
                    error: function (error) {
                        console.log(error);
                        $.unblockUI();
                        $.notify({
                            title: 'Error',
                            message: "Algo deu errado tente novament. :/",
                        },{
                            type: 'danger',
                        });
                    }
                });

            }

        });
    </script>
    @show


