<div class="row">
    <div class="col-md-7 col-md-7 col-sm-7">
        <div class="card card-stats">
            <div class="card-header" data-background-color="orange">
                <i class="fa fa-star-o"></i>
            </div>
            <form action="" class="form-group">
                <div class="card-content">
                    <h3 class="title">Avaliação</h3>
                    <br>
                    <label>Dê uma nota para o motorista:</label>
                    <br>
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
                    <br>
                    <label>Selecione suas qualidades:</label>
                    <br>
                    <label for="one">Muito Simpático</label>
                    <input type="checkbox" id="one" name="check_quality[]" value="simpatico"/>
                    <br>
                    <label for="two">Carro incrível</label>
                    <input type="checkbox" id="two" name="check_quality[]" value="carro_incrivel"/>
                    <br>
                    <label for="three">Dirige Bem</label>
                    <input type="checkbox" id="three" name="check_quality[]" value="bom_motorista"/>
                    <br>
                    <label for="three">Educado</label>
                    <input type="checkbox" id="three" name="check_quality[]" value="educado"/>
                    <br>
                    <label>Algo te incomodou?</label>
                    <br>
                    <label>Sim</label>
                    <input type="radio" name="complaint" value="1" id="complaint_true">
                    <br>
                    <label>Sem Queixas</label>
                    <input type="radio" value="0" name="complaint" id="nop">
                    <br>
                    <div id="complaint_comment" hidden>
                        <label>Por favor, descreva o que te incomodou.</label>
                        <textarea name="complaint_comment" class="form-control" placeholder="Reclame aqui...."></textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="#" class="btn btn-primary btn-round pull-right">Enviar formulário</a>
                </div>
            </form>

        </div>
    </div>

</div>

@section('scripts')

    <script>
        $(document).ready(function(){
            $('#complaint_true').change(function(){
                $('#complaint_comment').show();
            });

            $('#nop').change(function(){
                $('#complaint_comment').hide();
            });
        });
    </script>

    @show