@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Minhas viagens</h4>
                    <p class="category">Visualize suas últimas viagens</p>
                </div>
                <div class="card-content">
                    <div class="card-content table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <th>ID</th>
                            <th>Destino da viagem</th>
                            <th>Data</th>
                            <th>Caroneiro</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Campo Largo</td>
                                    <td>24/01/2017</td>
                                    <td>Christian</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>São Paulo</td>
                                    <td>14/09/2017</td>
                                    <td>Adriano</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show