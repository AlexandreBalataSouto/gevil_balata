@extends('layouts.template')
@section('contenido')
<br>
<div>
    <div>
		<h2 class="tituloH2">{{__('Species')}}</h2>
		<a href="{{ route('especies.create', app()->getLocale())}}" class="button is-warning botonAdd" tabindex="0">{{__('Add species')}}</a>	
	</div>
</div>
<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Photo')}}</th>
			<th style="display:none;"></th>
			<th>{{__('Common name')}}</th>
			<th>{{__('Scientific name')}}</th>
			<th>{{__('Legal status')}}</th>
			<th>{{__('Risk')}}</th>
			<th>{{__('Start work period')}}</th>
			<th>{{__('End of work period')}}</th>
			<th></th>
			<th></th>
		</tr>
	</thead>
    <tbody>
       	@foreach($especies as $especie)
       	<tr data-id="{{$especie['id_especie']}}" name="especie_seleccionada[]">
			<td>
				<a href="{{ route('getFotosEspecie',['language'=>app()->getLocale(),$especie['id_especie']])}}" class="button is success is small" style="height:30px;background-color:lightgreen;">
					<span class="icon is small"><i class="fas fa-camera"></i></span>
				</a>
			</td>
			<td style="display:none;">{{$especie['id_especie']}}</td>
			<td data-campo="nombre_comun" name="nombre_comun" class="campo" contenteditable='true'>{{ $especie->nombre_comun}}</td>
          	<td data-campo="nombre_cientifico" name="nombre_cientifico" class="campo" contenteditable='true'>{{ $especie->nombre_cientifico }}</td>
			<td name="estatus_legal" class="campo">
				<div class="select is-small">
					<select id="selectEstatus" data-campo="estatus_legal">    
					  <option value="invasora" <?php if($especie->estatus_legal =="invasora") echo 'selected="selected"'; ?>>{{__('invasive')}}</option>
					  <option value="potencialmente invasora" <?php if($especie->estatus_legal =="potencialmente invasora") echo 'selected="selected"'; ?>>{{__('potentially invasive')}}</option>
					  <option value="bajo vigilancia" <?php if($especie->estatus_legal =="bajo vigilancia") echo 'selected="selected"'; ?>>{{__('under surveillance')}}</option>
					</select>
				</div>
			</td>
		  	<td name="riesgo" class="campo">
				<div class="select is-small">
					<select id="selectRiesgo" data-campo="riesgo" >
					  <option value="alto" <?php if($especie->riesgo =="alto") echo 'selected="selected"'; ?>>{{__('high')}}</option>
					  <option value="medio" <?php if($especie->riesgo =="medio") echo 'selected="selected"'; ?>>{{__('medium')}}</option>
					  <option value="bajo" <?php if($especie->riesgo =="bajo") echo 'selected="selected"'; ?>>{{__('low')}}</option>
					</select>
				</div>
			</td>
			<td name="ini_periodo_trabajo" class="campo">
				<input data-campo="ini_periodo_trabajo" id="fecha_ini_trab" class="input is-small fecha" type="date" value="{{ $especie->ini_periodo_trabajo }}">
			</td>
			<td name="fin_periodo_trabajo" class="campo">
				<input data-campo="fin_periodo_trabajo" id="fecha_fin_trab" class="input is-small fecha" type="date" value="{{ $especie->fin_periodo_trabajo }}">
			</td>
			<td>
				<a href="{{ route('especies.edit',['language'=>app()->getLocale(),$especie->id_especie])}}" class="button is-info is-small" style="float:right;">{{__('Detail')}}</a>
			</td>
			<td>
				<form action="{{ route('especies.destroy', ['language'=>app()->getLocale(),$especie->id_especie])}}" method="post" name="delete_especie">
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
		  <th style="display:none;"></th>
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
				targets: [0,8,9],
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
			responsive: true,
			paging:   true,
			searching:true,
			info:     false,
			columnDefs:[ {
				targets: [0,8,9],
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
	
	$("#miDataTable").on("blur","#selectEstatus",function(){ //enclaves
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var estatus = $(this).children("option:selected").val();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+estatus);
		editar(id,campo,estatus);
	});
	
	$("#miDataTable").on("blur","#selectRiesgo",function(){ //enclaves
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var riesgo = $(this).children("option:selected").val();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+riesgo);	
		editar(id,campo,riesgo);
	});
	
	$("#miDataTable").on("blur","#fecha_ini_trab",function(){ //fecha
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var fechaI = $(this).val();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+fechaI);
		editar(id,campo,fechaI);
	});
	
	$("#miDataTable").on("blur","#fecha_fin_trab",function(){ //fecha
		var id = $(this).closest("tr").data("id");
		var campo = $(this).data("campo");
		var fechaF = $(this).val();
		console.log("id: "+id+" / campo: "+campo+" / valor: "+fechaF);	
		editar(id,campo,fechaF);
	});
			
	function editar(id, campo, valor){ //Funcion para editar por ajax
		$.ajax({
			method	: "POST",
			url	 	: "{{route('actualizarCampoEspecies',app()->getLocale())}}",
			data	: {
				id 		: id,
				campo 	: campo,
				valor	: valor,
				_token	: "{{csrf_token()}}",
			},
			success:function(){
				if(localeJquery == "es"){
					toastr.success(campo+" de especie editada");
				}else{
					toastr.success(campo+" of edited species");
				}
					
			}
		}).fail(function(){
				if(localeJquery == "es"){
					toastr.error("Error: ¡El campo '"+campo+"' con valor '"+valor+"' no esta bien formado!");
				}else{
					toastr.error("Error: field '"+campo+"' with value '"+valor+"' is not well formed!");
				}
			
		});
	}
	
});

</script>

@endsection