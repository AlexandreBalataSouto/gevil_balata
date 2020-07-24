@extends('layouts.template')
@section('contenido')
<br>
<div>
    <div>
		<h2>{{__('Photo')}}</h2>
	</div>
	<div>
		<a href="{{ route('especies.index', app()->getLocale()) }}" class="button is-warning">{{__('Return')}}</a>
		<a href="{{ route('fotos.create', app()->getLocale())}}" class="button is-warning botonAdd" tabindex="0">{{__('Add photo')}}</a>
	</div>
</div>
<br>

<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Image')}}</th>
			<th>{{__('Title')}}</th>
			<th>{{__('Description')}}</th>
			<th style="display:none;">Especie id</th>
			<th></th>
		</tr>
	</thead>
    <tbody>
       	@foreach($fotos as $foto)
       	<tr data-id="{{$foto['id_foto']}}">
			<td data-campo="imagen" name="imagen">
				<img id="fotoEspecie" alt="" height="96" width="96" src="{{ url('storage/fotos_especies/'.$foto->titulo) }}">
			</td>
			<td data-campo="titulo" name="titulo" class="campo">{{ $foto->titulo }}</td>
			<td data-campo="descripcion" name="descripcion" class="campo" contenteditable='true'>{{ $foto->descripcion }}</td>
			<td data-campo="especie_id" name="especie_id" class="campo" style="display:none;">{{ $foto->especie_id }}</td><!--style="display:none;" -->
			<td>
				<form action="{{ route('fotos.destroy', ['language'=>app()->getLocale(),$foto['id_foto']])}}" method="post" name="delete_foto">
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
          <th style="display:none;"></th>
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
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				targets: [0,2,3,4],
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
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				targets: [0,2,3,4],
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
		
	function editar(id, campo, valor){ //Funcion para editar por ajax
		$.ajax({
			method	: "POST",
			url	 	: "{{route('actualizarCampoFotos', app()->getLocale())}}",
			data	: {
				id 		: id,
				campo 	: campo,
				valor	: valor,
				_token	: "{{csrf_token()}}",
			},
			success:function(){
					if(localeJquery == "es"){
						toastr.success("Descripción de la foto editada");
					}else{
						toastr.success("Description of the edited photo");
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