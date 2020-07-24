<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GEVIL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		
		<!--BULMA CDN & FONT AWESOME (Bulma mejor instalarlo con npm)-->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
		<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
		<!--END BULMA CDN & FONT AWESOME (Bulma mejor instalarlo con npm)-->

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
			#hoja{
				width:70px;
				fill:#bf120a;
			}
			@font-face {
			font-family: Viga-Regular;
			src: url(./fonts/Viga-Regular.woff);
			}
			.gevilName{
				font-family:Viga-Regular;
				font-size:72px;
			}
			.g{color:#336633;}
			.e{color:#d5ae02;}
			.v{color:#f7650c;}
			.i{color:#bf120a;}
			.l{color:#272727;}

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 16px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
          
            <div class="content">
                <div class="title m-b-md">
					<img id="hoja" src="./img/leaf-solid.svg">
					<span class="gevilName g">G</span><span class="gevilName e">E</span><span class="gevilName v">V</span><span class="gevilName i">I</span><span class="gevilName l">L</span>
                </div>
				<div>
					<h1>
						 Gestion de Especies Vegetales Invasoras de Lanzarote
					</h1>
					<h2>
						Proyecto de Alex Balata Souto y Vicente Buet
					</h2>
                    
                    {{--
					<a href="{{route(Route::currentRouteName(), 'es')}}" class="button is-danger">{{__('spanish')}}</a>
					<a href="{{route(Route::currentRouteName(), 'en')}}" class="button is-link">{{__('english')}}</a>
                    --}}
                    
				</div>
				 @if (Route::has('login'))
                <div>
                    @auth
                        <a href="{{ route('home', app()->getLocale()) }}" class="button">{{__('Home')}}</a>
                    @else
                        <a href="{{ route('login', app()->getLocale()) }}" class="button">{{__('Login')}}</a>&nbsp;

                        @if (Route::has('register'))
                            &nbsp;<a href="{{ route('register', app()->getLocale()) }}" class="button">{{__('Register')}}</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </div>
    </body>
</html>
