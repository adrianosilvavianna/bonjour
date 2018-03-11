@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="container">

        <div class="row" id="chatting">
            <li class="list-group-item active">Chat</li>

            <ul class="list-group" v-chat-scroll>
                <message v-for="value in chat.message" :key=value.index>
                @{{ value }}
                </message>

            </ul>
            <input type="longtext" class="form-control" placeholder="Escreva sua mensagem..." v-model='message' @keyup.enter='send'>    
            </div>

        </div>
    </div>

@endsection
