@extends('layouts.app')

@section('content')

        <form action="{{ route('user.trip.search') }}" method="post"  class="navbar-form navbar-right" role="search" >

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group ">
                        <label for="location" >{{ busquePorLocal }}: </label>
                        <input type="text" class="form-control input-rounded" id="location" name="location" placeholder="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="location" >{{ busquePorData }}: </label>
                    <div class="input-group input-group-rounded">
                        <input type="date" class="form-control" id="date" name="date_trip">
                        <span class="input-group-btn">
                            <button class="btn btn-primary btn-group-right" type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>

        </form>

{{--eh obrigatorio o uso do container-fuid--}}


    @foreach($trips as $trip)
        @include('trip._cards', $trip)
    @endforeach


@endsection

@section('scripts')

@show





