@extends('layouts.template')
@section('contenido')
<br>
<div>
	<h2 class="tituloH2">{{__('Control methods of')}} {{$seguimientoControles->especie->nombre_comun}}</h2>
    <div>
		<form method="POST" action="{{route('setControlesSeguimiento',['language'=>app()->getLocale(),'id_seguimiento'=>$seguimientoControles->id_seguimiento])}}" enctype="multipart/form-data">
			{{ csrf_field() }}
			
			<button type="submit" class="button is-warning botonAdd" tabindex="0">{{__('Add method')}}</button>
			<div class="select botonAdd">
			  <select name="metodo">
				  @foreach($allMetodosControl as $metodoControl)
				<option value="{{$metodoControl->id_metodo_control}}">{{$metodoControl->nombre_metodo_control}}</option>
				  @endforeach
			  </select>
			</div>	
		</form>
		<a href="{{ route('seguimientos.index', app()->getLocale()) }}" class="button is-warning">{{__('Return')}}</a>
	</div>
</div>
<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Control methods')}}</th>
			<th>{{__('Descriptions')}}</th>
			<th>{{__('Observations')}}</th>
			<th>{{__('Delete')}}</th>
		</tr>
	</thead>
    <tbody>
    	@foreach($metodosControl as $control)
		<tr>
			<td>{{$control->nombre_metodo_control}}</td>
			<td>{{$control->descripcion}}</td>
			<td>{{$control->observacion}}</td>
			<td>
				<form  method="POST" action="{{route('deleteControlesSeguimiento',['language'=>app()->getLocale(),'id_metodo_control'=>$control->id_metodo_control])}}">
					{{ csrf_field() }}
					<button type="submit" class="button is-danger" style="float:right;">{{__('Delete')}}</button>
					<input type="hidden" name="id_seguimiento" value="{{$seguimientoControles->id_seguimiento}}">
				</form>
			</td>
		</tr>
		@endforeach
    </tbody>
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
		// Configuracion de DataTables
		$('#miDataTable').DataTable({
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				orderable: false,
				searchable: false,
				visible: true,
			},],
			order: [[ 1, 'desc' ]],
		});
	}
	
	
	
});
</script>
@endsection