@extends('layouts.template')
@section('contenido')
<br>
<div>
    <div>
		<h2 class="tituloH2">{{__('Tracing')}}</h2>
		<a href="{{ route('seguimientos.create', app()->getLocale())}}" class="button is-warning botonAdd" tabindex="0">{{__('Add tracing')}}</a>	
	</div>
</div>
<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Species')}}</th>
			<th>{{__('Location')}}</th>
			<th>Enclave</th>
			<th>{{__('Municipality')}}</th>
			<th>{{__('Control recommendation')}}</th>
			<th>{{__('Next revision')}}</th>
			<th></th>
			<th></th>
			<th></th>
		</tr>
	</thead>
    <tbody>
       	@foreach($seguimientos as $seguimiento)
		
     	<tr data-id="{{$seguimiento->id_seguimiento}}">
			<td data-campo="especie" name="especie" class="campo">{{ $seguimiento->especie->nombre_comun }}</td>
			<td data-campo="localizacion" name="localizacion" class="campo">{{ $seguimiento->localizacion->coord_utm }}</td>
			<td data-campo="enclave" name="enclave" class="campo">{{ $seguimiento->localizacion->enclave->nombre_enclave }}</td>
			<td data-campo="municipio" name="municipio" class="campo">{{ $seguimiento->localizacion->enclave->municipio }}</td>
			<td data-campo="recomendacion" name="recomendacion" id="recomend" class="campo" contenteditable='true'>{{ $seguimiento->recomendacion }}</td>
			<td name="proxima_fecha" class="campo">
				<input data-campo="proxima_fecha" id="proxima_fecha" class="input is-small fecha" type="date" value="{{ $seguimiento->proxima_fecha }}">
			</td>
			<td>
				<a href="{{ route('getControlesSeguimiento',['language'=>app()->getLocale(),$seguimiento['id_seguimiento']])}}" class="button is-primary is-small">{{__('Controls')}}</a>
			</td>
			<td>
				<a href="{{ route('seguimientos.edit', ['language'=>app()->getLocale(),$seguimiento['id_seguimiento']])}}" class="button is-info is-small">{{__('Edit')}}</a>
			</td>
			<td>
				<form action="{{ route('seguimientos.destroy', ['language'=>app()->getLocale(),$seguimiento['id_seguimiento']])}}" method="post" name="delete_seguimiento">
					{{ csrf_field() }}
					@method('DELETE')
					<button type="submit" class="button is-danger is-small" style="float:right;">{{__('Delete')}}</button>
				</form>
			</td>
       	</tr>
		@endforeach
    </tbody>
 	<tfoot>
       <tr>
		  <th></th>
          <th></th>
		  <th></th>
          <th></th>
		  <th></th>
          <th></th>
		  <th></th>
		  <th></th>
		  <th></th>
       </tr>
    </tfoot>
</table>

<script>
$(document).ready( function () {
	var localeJquery ='{{ config('app.locale') }}';
	
	if(localeJquery == "es"){
		// Configuracion de DataTables
		$('#miDataTable').DataTable({
			responsive: true,
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				targets: [4,6,7,8],
				orderable: false,
				searchable: false,
				visible: true,
			},],
			order: [[ 1, 'desc' ]],
			language: {
				"decimal": "",
				"emptyTable": "No hay informacion",
				"info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
				"infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
				"infoFiltered": "(Filtrado de _MAX_ total entradas)",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "Mostrar _MENU_ Entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "Sin resultados encontrados",
				"paginate": {
					"first": "Primero",
					"last": "Ultimo",
					"next": "Siguiente",
					"previous": "Anterior"
				}
			},	
		});
	}else{
		$('#miDataTable').DataTable({
			responsive: true,
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				targets: [4,6,7,8],
				orderable: false,
				searchable: false,
				visible: true,
			},],
			order: [[ 1, 'desc' ]],	
		});
	}
	
	
	// Editar campos de la tabla
	$("#miDataTable").on("keypress",".campo",function(e){ //debe apuntar a algo q exista y luego realizar la accion
		if(e.which == 13) { //Si pulsamos enter
			e.preventDefault(); //Esto evita que haga un salto de linea
			$(this).trigger("blur"); //Activa el evento blur
		} 
	});
	
	// El evento 'blur' dispara el procedimiento para guardar el valor del campo 'campo' en el registro 'id'	
	// si vamos a usar la vble id dentro del ajax debemos usar .on 
	$("#miDataTable").on("blur","td[contenteditable='true']",function(){	// cambiada por esta linea funciona en todas las paginas
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var valor = $(this).text();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+valor);	
		editar(id,campo,valor);	
	});
		
	$("#miDataTable").on("blur","#proxima_fecha",function(){ //fecha
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var fechaProx = $(this).val();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+fechaProx);
		editar(id,campo,fechaProx);
	});
	
	function editar(id,campo, valor){ //Funcion para editar por ajax
		$.ajax({
			method	: "POST",
			url	 	: "{{route('actualizarCampoSeguimientos', app()->getLocale())}}",
			data	: {
				id 		: id,
				campo 	: campo,
				valor	: valor,
				_token	: "{{csrf_token()}}",
			},
			success:function(){
				if(localeJquery == "es"){
					toastr.success(campo+" de seguimiento editado");
				}else{
					toastr.success(campo+" edited tracking");
				}
					
			}
		}).fail(function(){
			if(localeJquery == "es"){
				toastr.error("Error: El campo '"+campo+"' con valor '"+valor+"' no esta bien formado!");
			}else{
				toastr.error("Error: field '"+campo+"' with value '"+valor+"' is not well formed!");
			}
		});
	}
	
});

</script>
@endsection