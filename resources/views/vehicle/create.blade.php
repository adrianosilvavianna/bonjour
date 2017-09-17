@extends('layouts.app')

@section('content')
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Meus veículos</h4>
                    <p class="category">Cadastre seu veículo</p>
                </div>
                <div class="card-content">
                    <form action="{{ route('user.vehicle.store') }}" method="post" >


                        <div class="row ">
                            <div class="col-md-3 {{ $errors->has('name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Modelo</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Cor</label>
                                    <input type="text" name="last_name" class="form-control" value="{{ old('name') }}">
                                </div>
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Ano</label>
                                    <input type="numeric" name="age" class="form-control" value="{{ old('age') }}">
                                </div>
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-3 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <div class="form-group label-floating">
                                    <label class="control-label">Marca</label>
                                    <input type="text" name="age" class="form-control" value="{{ old('age') }}">
                                </div>
                                @if ($errors->has('age'))
                                    <span class="help-block">
                                        <strong class="red-text">{{ $errors->first('age') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <i class="material-icons">get_app</i>
                                    <input type="file" class="btn btn-primary" name="photo"/>Carregar foto...
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Salvar Veículo</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('scripts')

    @show