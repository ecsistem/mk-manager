    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Painel de pagamentos - CAIXA</title>
        <!-- <meta http-equiv="refresh" content="60" > -->
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/skins/_all-skins.min.css">

        <!-- iCheck -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/square/_all.css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        @yield('css')


    </head>

    <body class="skin-blue sidebar-mini">
    @if (!Auth::guest())
        <div class="wrapper">
            <div class="content-wrapper" style="margin-left: 0; font-size: 1.5em;">
                    <section class="content-header">
            <!-- <h1 class="pull-left">Membros com pagamento pendente</h1> -->
            <h1 class="pull-right">
            <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px; font-size: 1em;" href="{!! route('users.create') !!}">Cadastrar Membro</a>
            </h1>
            <input id="search" type="text" placeholder="PESQUISAR" style="width: 100%;"/>
        </section>
        <div class="content">
            <div class="clearfix"></div>

            @include('flash::message')

            <div class="clearfix"></div>
            <div>
                <div>
        @foreach($users as $user)

        <div class="box box-{!! $user->general_status_id == 1 ? 'success' : 'warning' !!}">
            <div class="box-header" style="background: #c7eaff;padding: 3px 15px;">
                <b class="usernamee">{!! $user->username !!}</b>
                </div>
                <div class="box-body hide">
                    <div class="" style="padding-left: 20px">
                        <p style="float:left; text-align:left" class="col-xs-12"><b>Pacote: </b>{!! $user->plan->name !!} - R$ {!!  number_format($user->plan->price, 2, '.', ',') !!}</p>
                        <p style="float:left; text-align:left" class="col-xs-12"><b>Vencimento: </b>{!! date("d/m/Y", strtotime($user->last_payment. ' + 30 days')) !!}</p>
                        @if($user->payment_promise < 2)
                        <a class="btn btn-{!! $user->payment_promise < 1 ? 'warning' : 'danger' !!} pull-left" style="font-size: 0.8em;" href="{!! route('users.promisePayment', [$user->id]) !!}" onclick="return confirm('Confirmar PROMESSA DE PAGAMENTO do usuário {!! $user->username !!}?')">ADIAR</a>
                        @endif
                        {!! Form::open(['route' => ['users.confirmPayment'], 'method' => 'post']) !!}
                        {!! Form::hidden('id', $user->id, []) !!}
                        {!! Form::button('PAGO', ['type' => 'submit', 'class' => 'btn btn-success pull-right', 'style' => 'font-size: 0.8em;', 'onclick' => "return confirm('Confirmar PAGAMENTO do usuário " . $user->username . "?')"]) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        @if(5 < 2)
            <tr style="{!! $user->general_status_id == 1 ? 'background: #44ff4424;' : '' !!}">
                <td style="padding: 15px 5px;">{!! $user->username !!}</td>
            <td style="padding: 15px 5px;">{!! $user->plan->name !!} - R$ {!!  number_format($user->plan->price, 2, '.', ',') !!}</td>
            <!-- <td style="padding: 15px 5px;">R$ {!!  number_format($user->plan->price, 2, '.', ',') !!}</td> -->
                <td style="padding: 15px 5px;">{!! date("d/m/Y", strtotime($user->last_payment)) !!}</td>
                <td style="padding: 15px 10px;">
                    
                    @if($user->payment_promise < 2)
                    <a class="btn btn-{!! $user->payment_promise < 1 ? 'warning' : 'danger' !!} pull-left" style="font-size: 0.8em;" href="{!! route('users.promisePayment', [$user->id]) !!}" onclick="return confirm('Confirmar PROMESSA DE PAGAMENTO do usuário {!! $user->username !!}?')">ADIAR</a>
                    @endif
                    
                    {!! Form::open(['route' => ['users.confirmPayment'], 'method' => 'post']) !!}
                        {!! Form::hidden('id', $user->id, []) !!}
                        {!! Form::button('PAGO', ['type' => 'submit', 'class' => 'btn btn-success pull-right', 'style' => 'font-size: 0.8em;', 'onclick' => "return confirm('Confirmar PAGAMENTO do usuário " . $user->username . "?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @endif
        @endforeach
  
                </div>
            </div>
        </div>
            </div>

        </div>
        @endif

        <!-- jQuery 3.1.1 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- AdminLTE App -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/js/adminlte.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/icheck.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>

        @yield('scripts')

        <script>
        $(document).ready(function(){

            $('#search').keyup(function(el){
                $('.usernamee').each(function(i, e){
                    if(e.innerText.toLowerCase().indexOf(el.target.value.toLowerCase()) > -1) {
                        $(e.parentElement.parentElement).removeClass('hide');
                    } else {
                        $(e.parentElement.parentElement).addClass('hide');
                    }
                });
            });

            $('.box-header').click(function(e){
                if($(e.target.nextElementSibling).hasClass('hide')) $(e.target.nextElementSibling).removeClass('hide');
                else $(e.target.nextElementSibling).addClass('hide');
            });
        });
        </script>
    </body>
    </html>