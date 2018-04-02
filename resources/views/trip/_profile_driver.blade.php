<div class="card">
    <div class="card-body">
        <div class="card-two">
            <header>
                <div class="avatar">
                    <img src="{{ asset($trip->User->Profile->photo_address) }}" alt="{{ $trip->User->Profile->name }}" />
                </div>
            </header>

            <h3>
                {{ $trip->User->Profile->name }}
            </h3>
            <div class="desc">
                {{ $trip->User->Profile->about }}
            </div>
            <div class="contacts">
                <a href="#" id="profile_information"><i class="fa fa-plus"></i></a>
                <a href="#" id="profile_phone"><i class="fa fa-whatsapp"></i></a>
                <a href="#" id="profile_email"><i class="fa fa-envelope"></i></a>

                <div class="clear"></div>
            </div>
            <div class="card-body browser">
                <p class="m-t-30 f-w-600">
                    Ranking :
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                </p>
                
                <p class="m-t-30 f-w-600"><a href="#" id="more_information">Dados de Perfil</a><span class="pull-right"><a href="#" id="more_information">{{ $trip->User->Profile->User->rakingProfile() }}%</a></span></p>
                <div class="progress">
                    <div role="progressbar" style="width: {{ $trip->User->Profile->User->rakingProfile() }}%; height:8px;" class="progress-bar bg-success wow animated progress-animated"> <span class="sr-only">{{ $trip->User->Profile->User->rakingProfile() }}% Complete</span> </div>
                </div>

            </div>
        </div>
    </div>
</div>


@section('scripts')
    @parent
    <script>
        $('#profile_information').click(function(){
            swal({
                title: "Mais informações sobre {{ $trip->User->Profile->name }}",
                text: "Idade : {{ $trip->User->Profile->age }} <br> Sexo: {{ getGender($trip->User->Profile->gender) }} <br> Sobre : {{ $trip->User->Profile->about }}",
                html: true
            });
        });

        $('#profile_phone').click(function(){
            swal({
                title: "+55 {{ $trip->User->Profile->phone }}",
                text: "Grave este numero em seu aparelho celular, caso seja necessário entrar em contato com {{ $trip->User->Profile->name }}",
            });
        });

        $('#profile_email').click(function(){
            swal({
                title: "Email de contato",
                text: "Email principal é : {{ $trip->User->Profile->User->email }} <br> Este usuário também pode ter estes emails: <br> {{ $trip->User->Profile->User->facebook }} <br> {{ $trip->User->Profile->User->github }}",
                html: true,
            });
        });

        $('#more_information').click(function(){
            swal({
                title: "Complete suas informações",
                text: "Continue completando seu cadastro, essas infomações são importantes para os outros usuários te conhecerem melhor",
            });
        });
    </script>

@show
