<!DOCTYPE html>
<html>
    <head>
        <title>Entel Trivia</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        
        
        <meta name='robots' content='noindex,nofollow' />

        <meta name="msapplication-TileColor" content="#123456"/>
        <meta name="msapplication-square150x150logo" content="http://platcel.com/aplication/assets/static.imgs/favicon.png"/>

        <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,300,500' rel='stylesheet' type='text/css'>
        <!-- basic styles -->
        {!! Html::style('user/css/normalize.css?v=0.3.0') !!}
        {!! Html::style('user/css/app.css?v=0.3.0')  !!}
        
    </head>
    <body>
        <div class="app">
            <form onsubmit="false" class="frmlogin" role="form" method="POST" action="{{ url('/auth_ps') }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="logo">
                    {!! Html::image('user/img/login_logo_entel.png') !!}
                </div>
                <div class="input-layer">
                    <label>ingresa tu NOMBRE</label>
                    <span class="left"></span>
                    <input type="email" id="email" name="email" placeholder="Correo electronico" />
                    <span class="right"></span>
                </div>
                <div class="input-layer">
                    <label>ingresa tu DNI</label>
                    <span class="left"></span>
                    <input type="password" id="dni" name="dni" placeholder="Contraseña" />
                    <span class="right"></span>
                </div>
                <input class="send" type="submit" value="Ingresar" />
            </form>
            
            
            
        </div>
    

		    {!! Html::script('user/js/libraries/jquery/jquery-2.2.3.min.js?v=0.3.0') !!}
	    	{!! Html::script('user/js/app/login.js?v=0.3.0') !!}
    </body>
</html>