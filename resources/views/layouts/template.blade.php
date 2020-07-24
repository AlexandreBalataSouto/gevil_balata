<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>GEVIL</title>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!--BULMA CDN & FONT AWESOME (Bulma mejor instalarlo con npm)-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
	<!--END BULMA CDN & FONT AWESOME (Bulma mejor instalarlo con npm)-->

	<!--DATATABLE-->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js">
	</script>
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.dataTables.min.css">
	<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
	<!--END DATATABLE-->

	<!--TOASTR LIBRARY-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<!--END TOASTR LIBRARY-->

	<!--DropZone library-->
	<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
	<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
	<!--End DropZone library-->


</head>
<style>
	#hoja {
		width: 70px;
		fill: #bf120a;
	}

	@font-face {
		font-family: Viga-Regular;
		src: url(/fonts/Viga-Regular.woff);
	}

	.gevilName {
		font-family: Viga-Regular;
		font-size: 72px;
	}

	.g {
		color: #336633;
	}

	.e {
		color: #d5ae02;
	}

	.v {
		color: #f7650c;
	}

	.i {
		color: #bf120a;
	}

	.l {
		color: #272727;
	}

	.gevilIcon {
		width: 20%;
		padding-bottom: 1%;
	}

	.mainLeaves {
		width: 75%;
		display: block;
		margin-top: 1%;
		margin-left: auto;
		margin-right: auto;
	}

	.buttonHelp{
		float: right;
		margin-left: 2%;
	}

	.tituloH2 {
		float: left;
	}

	.fecha {
		width: 160px;
	}

	.botonAdd {
		float: right;
	}

	.navbar-link,
	.navbar-item,
	.navbar-burger.burger {
		color: #D5AE02;
	}

	.navbar-link,
	.navbar-item {
		background: #336633;
		color: #D5AE02;
	}

	.navbar-link,
	.navbar-item a:hover {
		background: #336633;
		color: #D5AE02;
	}

	.div-navbar-item a:hover {
		background: #336633;
		color: #D5AE02;
	}


	#trueNavbar {
		background-color: #336633;
		padding-left: 2%;
	}

	footer,
	.span01 {
		background-color: #336633;
		color: #336633;
	}

	#miDataTable td,
	#miDataTable th {
		text-align: center;
	}

	#fotoEspecie:hover {
		transform: scale(5);
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
	}

	.eligeFoto {
		margin-top: 32px;
		margin-right: 12px;
	}

	#distribuido {
		width: 100%;
		display: flex;
		justify-content: space-between;
	}

	#distribuido>div {
		flex-grow: 1;
		width: 20%;
	}
</style>

<body>
	<div class="container">
		<a href="{{url('/')}}">
			<img id="hoja" src="{{asset('/img/leaf-solid.svg')}}">
			<span class="gevilName g">G</span>
			<span class="gevilName e">E</span>
			<span class="gevilName v">V</span>
			<span class="gevilName i">I</span>
			<span class="gevilName l">L</span>
		</a>
		<nav id="trueNavbar" class="navbar is-transparent" role="navigation" aria-label="main navigation">
			<div class="navbar-brand">
				<a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
					data-target="navbarBasicExample">
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
					<span aria-hidden="true"></span>
				</a>
			</div>
			<div class="navbar-menu">
				<div class="navbar-start">
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							{{__('Basic data')}}
						</a>

						<div class="navbar-dropdown">
							<a class="navbar-item" href="{{route('enclaves', app()->getLocale())}}">
								Enclaves
							</a>
							<a class="navbar-item" href="{{route('localizaciones', app()->getLocale())}}">
								{{__('Locations')}}
							</a>
							<a class="navbar-item" href="{{route('metodosControl', app()->getLocale())}}">
								{{__('Control methods')}}
							</a>

						</div>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							{{__('Reports')}}
						</a>
						<div class="navbar-dropdown">
							<a class="navbar-item"
								href="{{route('pdfs',['language'=>app()->getLocale(),'enclaves'],'enclaves' ) }}">
								{{__('Enclaves report')}}
							</a>
							<a class="navbar-item"
								href="{{route('pdfs',['language'=>app()->getLocale(),'localizaciones'],'localizaciones') }}">
								{{__('Locations report')}}
							</a>
							<a class="navbar-item"
								href="{{route('pdfs',['language'=>app()->getLocale(),'metodos_control'],'metodos_control') }}">
								{{__('Control methods report')}}
							</a>
						</div>
					</div>
				</div>
				<div class="navbar-end">
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							@if (app()->getLocale() == "es")
								<img src="{{asset('/img/spain_icon.png')}}"><strong>ESP</strong>
							@else
								<img src="{{asset('/img/uk_icon.png')}}"><strong>ENG</strong>
							@endif
						</a>
						<div class="navbar-dropdown">
							<a class="navbar-item" href="{{route(Route::currentRouteName(), 'es')}}">
								<img src="{{asset('/img/spain_icon.png')}}"><strong>ESP</strong>
							</a>
							<a class="navbar-item" href="{{route(Route::currentRouteName(), 'en')}}">
								<img src="{{asset('/img/uk_icon.png')}}"><strong>ENG</strong>
							</a>
						</div>
					</div>
					<div class="navbar-item has-dropdown is-hoverable">
						<a class="navbar-link">
							{{ Auth::user()->name }}
						</a>
						<div class="navbar-dropdown">
							@guest
							@if (Route::has('register'))
							<a class="navbar-item">
								<a href="{{ route('register', app()->getLocale()) }}">{{ __('Register') }}</a>
							</a>
							@endif
							@else
							<a class="navbar-item" href="{{ route('logout', app()->getLocale()) }}" onclick="event.preventDefault(); 
																							   document.getElementById('logout-form').submit();">
								{{ __('Logout') }}
							</a>
							<form id="logout-form" action="{{ route('logout', app()->getLocale()) }}" method="POST"
								style="display: none;">
								@csrf
							</form>
							@endguest
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="content">
			@yield('contenido')
		</div>
		<footer><span class="span01">eso</span></footer>
	</div>
</body>

</html>

<script>
	$(document).ready(function() {

  // Check for click events on the navbar burger icon
  	$(".navbar-burger").click(function() {

	  // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
	  $(".navbar-burger").toggleClass("is-active");
	  $(".navbar-menu").toggleClass("is-active");

  	});	

  //--script para configurar y manejar Toastr ----->
	toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "newestOnTop": true,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "preventDuplicates": false,
	}
	
	@if(Session::has('message'))
	  var type = "{{ Session::get('alert-type', 'info') }}";
	  switch(type){
		case 'info':
			  toastr.info("{{ Session::get('message') }}");
			  break;

		case 'warning':
			  toastr.warning("{{ Session::get('message') }}");
			  break;

		case 'success':
			  toastr.success("{{ Session::get('message') }}");
			  break;

		case 'error':
			  toastr.error("{{ Session::get('message') }}");
			  break;
	  }
	@endif 

	//-- para cerrar mensajes de error o aviso -->
	$('.message .close')
	  .on('click', function() {
		$(this)
		  .closest('.message')
		  .transition('fade')
		;
	});
});


</script>