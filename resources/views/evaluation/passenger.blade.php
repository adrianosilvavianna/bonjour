@extends('layouts.app')

@section('css')
    <link href="{{ asset('css/star.css') }}" rel="stylesheet">
@show

@section('content')

    @foreach($trip->Meetings as $meeting)

        @if(!$trip->EvaluationsTo($meeting->User))
            <div class="col-md-4">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="card-avatar">
                            <a href="">
                                <img class="img circle" src="{{ asset($meeting->User->Profile->photo_address) }}"/>
                            </a>
                        </div>
                    </div>
                    <form method="post" action="{{ route('user.evaluation.store', $trip) }}" class="form-group">
                        <div class="card-content">
                            <h3 class="title">Avaliação</h3>
                            <br>
                            <label>Dê uma nota para o passageiro:</label>
                            <br>

                            <fieldset>
                                <span class="star-cb-group star_rating">
                                  <input type="radio" id="rating-5" name="nota" value="5"/><label for="rating-5">5</label>
                                  <input type="radio" id="rating-4" name="nota" value="4" checked="checked"/><label for="rating-4">4</label>
                                  <input type="radio" id="rating-3" name="nota" value="3"/><label for="rating-3">3</label>
                                  <input type="radio" id="rating-2" name="nota" value="2"/><label for="rating-2">2</label>
                                  <input type="radio" id="rating-1" name="nota" value="1"/><label for="rating-1">1</label>
                                  <input type="radio" id="rating-0" name="nota" value="0" class="star-cb-clear"/><label for="rating-0">0</label>
                                </span>
                            </fieldset>

                            <br>
                            <label>Selecione suas qualidades:</label>
                            <br>
                            <label for="one">Muito Simpático</label>
                            <input type="checkbox" id="one" name="check_quality[]" value="simpatico"/>
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
                                <textarea name="complaint_comment" class="form-control"
                                          placeholder="Reclame aqui...."></textarea>
                            </div>
                        </div>
                        <input type="number" name="user_to" value="{{ $meeting->user_id }}" hidden>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-round pull-right">Enviar formulário
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        @endif
    @endforeach

@endsection

@section('scripts')
    @parent
    <script>
        $('#complaint_true').change(function () {
            $('#complaint_comment').show();
        });

        $('#nop').change(function () {
            $('#complaint_comment').hide();
        });
    </script>
    <script src="{{ asset('js/star.js') }}" type="text/javascript"></script>

@show