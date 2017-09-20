@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Meu Veículo</h4>
                        <p class="category">Cadastre seu veiculo</p>
                    </div>
                    <div class="card-content">
                        <form action="{{ route('user.vehicle.store') }}" method="post" >


                            <div class="col-md-12 ">
                                <div class="col-md-6 {{ $errors->has('name') ? ' has-error' : '' }}">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Nome</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('name') }}</strong>
                                </span>
                                    @endif
                                </div>
                                <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Marca</label>
                                        <input type="text" name="last_name" class="form-control" value="{{ old('name') }}">
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('last_name') }}</strong>
                                </span>
                                    @endif
                                </div>
                            </div>
                            <div class="cold-md-12">
                                <div class="col-md-6 {{ $errors->has('last_name') ? ' has-error' : '' }}">
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
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Passageiros</label>
                                        <select type="text" name="gender" class="form-control">
                                            <option value="0">2</option>
                                            <option value="1">3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-6 {{ $errors->has('phone') ? ' has-error' : '' }}">
                                    <div class="form-group label-floating">
                                        <label class="control-label">Placa</label>
                                        <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                                    </div>
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                    <strong class="red-text">{{ $errors->first('phone') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <i class="material-icons">get_app</i>
                                    <input type="file" class="btn btn-primary" name="photo"/>Carregar foto...
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Salvar perfil</button>
                    </div>
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