@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Meus Veiculos</h4>
                        <p class="category">Cadastre seu veiculo</p>
                    </div>
                    <div class="card-content">

                                <div class="card-content table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Marca</th>
                                        <th>Ano</th>
                                        <th>Passageiros</th>
                                        <th>Placa</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Chevete</td>
                                            <td>Chevrolet</td>
                                            <td>1991</td>
                                            <td>3</td>
                                            <td>ago-9078</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Uno</td>
                                            <td>Fiat</td>
                                            <td>2012</td>
                                            <td>3</td>
                                            <td>ago-9078</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                     </div>
                </div>
            </div>
    <div class="content">
        <h6 class="category text-gray">...</h6>

        <p class="card-content">


        </p>
        <a href="#" class="btn btn-primary btn-round">Cadastrar</a>
        <a href="#" class="btn btn-primary btn-round">Editar</a>


    </div>
        </div>

    </div>
    </div>
@endsection

@section('scripts')

@show