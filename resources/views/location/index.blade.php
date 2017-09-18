@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Meus Locais</h4>

                        <div class="nav-tabs-navigation">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" >
                                    <li class="">
                                        <a href="{{ route('user.location.create') }}" >
                                            <i class="material-icons">add_circle</i>
                                            Cadastrar mais locais
                                            <div class="ripple-container"></div></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table">
                            <thead class="text-primary">
                            <tr><th>Name</th>
                                <th>Logadouro</th>
                                <th>#</th>
                            </tr></thead>
                            <tbody>
                            @foreach($locations as $location)
                                <tr>
                                    <td>{{ $location->name }}</td>
                                    <td>{{ $location->txtEndereco }}</td>
                                    <td><a href="{{ route('user.location.delete') }}"> <i class="material-icons">delete_sweep</i> </a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection