@extends('layouts.app_laravel')

@section('content')



    <div class="container-fluid">
        <div class="row" id="chatting">
            <ul class="list-group">
                <li class="list-group-item active">Chat</li>
                <message
                    v-for="value in chat.message" :key=value.index
                >
                    @{{ value }}

                </message>
                <input type="longtext" class="form-control" placeholder="Escreva sua mensagem..." v-model='message' @keyup.enter='send'>
            </ul>
        </div>
    </div>

@endsection