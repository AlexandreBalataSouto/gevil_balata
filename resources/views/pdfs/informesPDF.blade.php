<!DOCTYPE html>
<html>
<head>
<title>Informe</title>
</head>
<style>
	#hoja{
		width:70px;
		fill:#bf120a;
	}
	@font-face {
		font-family: Viga-Regular;
		src: url(/fonts/Viga-Regular.woff);
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
    .gevilIcon {
        width: 20%;
        padding-bottom: 1%;
    }
	
	table th, td{
		border: 1px solid black;
	}
	td{
		text-align:center;
	}
</style>
<body>
	
{{--<img id="hoja" src="{{asset('/img/leaf-solid.svg')}}">--}}
<img id="hoja" src="{{public_path('/img/leaf-solid.svg')}}">
<span class="gevilName g">G</span>
<span class="gevilName e">E</span>
<span class="gevilName v">V</span>
<span class="gevilName i">I</span>
<span class="gevilName l">L</span>
	
<h1>Informe</h1>

<table>
	<thead>
		<tr>
			@foreach(array_keys($datos[0]) as $campo)
			<th>{{str_replace('_',' ',ucfirst($campo))}}</th>   
			@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($datos as $dato)
		<tr>
			@foreach(array_keys($datos[0]) as $campo) 
				@if($campo=='confirmada')
					<td>{{$dato[$campo]!='0'?'Si':'No'}}</td>
				@elseif($campo=='enclave')
					<td>{{App\Enclave::find($dato[$campo])->nombre_enclave}}</td>
				@else
					<td>{{$dato[$campo]}}</td> 
				@endif
			@endforeach
		</tr>
		@endforeach
	</tbody>
</table>
	
</body>
</html>