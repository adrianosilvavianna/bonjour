@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-nav-tabs">
                <div class="card-header" data-background-color="purple">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">

                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="active">
                                    <a href="#finished" data-toggle="tab">
                                        <i class="material-icons">check_box</i>
                                        {{ finalizadas }}
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#pending" data-toggle="tab">
                                        <i class="material-icons">error_outline</i>
                                        
                                        {{ pendentes }}
                                        <div class="ripple-container"></div></a>
                                </li>
                                <li class="">
                                    <a href="#canceled" data-toggle="tab">
                                        <i class="material-icons">cancel</i>
                                        {{ canceladas }}
                                        <div class="ripple-container"></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-content" style="background-color: #f9f9f9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="finished">
                            @foreach($tripsFinished as $trip)
                                @include('trip._cards', $trip)
                            @endforeach
                        </div>
                        <div class="tab-pane" id="pending">
                            <div class="container-fluid">
                                @foreach($tripsPending as $trip)
                                    @include('trip._cards', $trip)
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane" id="canceled">
                            <div class="container-fluid">
                                @foreach($tripsCanceled as $trip)
                                    @include('trip._cards', $trip)
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection





