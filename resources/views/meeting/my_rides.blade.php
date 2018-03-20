
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
                                    <a href="#accept" data-toggle="tab">
                                        <i class="material-icons">check_box</i>
                                        {{ aceitas }}
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

                <div class="card-content">
                    <div class="tab-content">
                        <div class="tab-pane active" id="accept">
                            @foreach($meetingApproved as $meeting)
                                @include('trip._cards', ['trip' => $meeting->Trip])
                            @endforeach
                        </div>
                        <div class="tab-pane" id="pending">
                            <div class="container-fluid">
                                @foreach($meetingPending as $meeting)
                                    @include('trip._cards', ['trip' => $meeting->Trip])
                                @endforeach
                            </div>
                        </div>
                        <div class="tab-pane" id="canceled">
                            <div class="container-fluid">
                                @foreach($meetingReproved as $meeting)
                                    @include('trip._cards', ['trip' => $meeting->Trip])
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection





