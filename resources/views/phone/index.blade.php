@extends('layouts.app')

@section('content')

<div class="col-md-6">
    <div class="card card-profile">
        <div class="content">
            <div class="col-md-12">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Telefones</h4>
                    <p class="category">Meus telefones</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>Telefone</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>(41) 9 9528-5444</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
    </div>
</div>
<div class="col-md-6">
    <div class="card card-profile">
        <div class="content">
            <div class="col-md-12">
                <div class="card-header" data-background-color="purple">
                    <h4 class="title">Telefones</h4>
                    <p class="category">Cadastrar telefones</p>
                </div>
                 <form>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <input type="text" name="phone" class="form-control" placeholder="Telefone" value="">
                            </div>
                        </div>
                    </div>
                     <button type="submit"  class="btn btn-primary btn-round">Salvar telefones</button>
                </form>
            </div>
           
        </div>
    </div>
</div>
@endsection

@section('scripts')

@show
