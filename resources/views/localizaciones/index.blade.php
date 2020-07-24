@extends('layouts.template')
@section('contenido')
<br>
<div>
	<h2 class="tituloH2">{{__('Locations')}}</h2>
	<button class="button is-info is-rounded buttonHelp"><i class="fas fa-question"></i></button>
	<button class="button is-warning botonAdd">{{__('New location')}}</button> <!--Este boton activa el modal-->
</div>
<br>

<div class="modal" id="helpModal">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title">{{__('Help')}}</p>
			<button class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">
			<p>
				{!!__('This is a <strong>BREAD of Locations</strong>, you can edit all the fields of the table <strong>dynamically</strong>, for example in the field <strong>Observations</strong>click on any register, then type something and now press enter or click outside the field.')!!}
			</p>
		</section>
	</div>
</div>

<div class="modal" id="modalLocalizacion">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title" id="titleLocalizacionModal">{{__('New location')}}</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
		<form class="formLocalizacion">
			<!--Coordenadas-->
			<div class="field">
			  <label class="label">{{__('Coordinates of the location')}}</label>
			  <div class="control">
				<input id="coord_utm" class="input" type="text" placeholder="{{__('coordinates')}}">
			  </div>
			</div>
			<!--Fecha de alta/ Altura-->
			<div class="field is-grouped">
				<p class="control">
					<label class="label">{{__('Discharge date')}}</label>
					<input id="fecha_alta" class="input" type="date" value="{{date('Y-m-d')}}">
				</p>
				<p class="control">
					<label class="label">{{__('Height')}}</label>
					<input id="altura" class="input" type="text">
				</p>
			</div>
			<!--Enclaves-->
			<div class="field is-grouped">
				<p class="control">
					<label class="label">Enclaves</label>
					<span class="select">
				  		<select class="enclaves">
							<option disabled selected>{{__('Select an enclave')}}</option>
							@foreach ($enclaves as $enclave)
							<option value="{{$enclave->id_enclave}}">{{$enclave->nombre_enclave}}</option>
							@endforeach
				  		</select>
			  		</span>
				</p>
				<p class="control">
					<label class="label">{{__('Confirm')}}</label>
					<input type='checkbox' class="confirmar">
				</p>
			</div>
			<!--Observaciones-->
			<div class="field">
			  <label class="label">{{__('Observations')}}</label>
			  <div class="control">
				<textarea class="textarea" placeholder="{{__('Your observations here ...')}}"></textarea>
			  </div>
			</div>
		</form>
		<span class="mensajeLocalizacionBorrar">{{__('Do you want to delete this location?')}}</span>
		<input type="hidden" value="0" class="idRowLocalizacion">
    </section>
    <footer class="modal-card-foot" id="footerLocalizacionCrear">
      <button class="button is-success">{{__('Save')}}</button>
      <button class="button is-danger">{{__('Cancel')}}</button>
    </footer>
	<footer class="modal-card-foot" id="footerLocalizacionBorrar">
      <button class="button is-success">{{__('Accept')}}</button>
      <button class="button is-danger">{{__('Cancel')}}</button>
    </footer>
  </div>
</div>

<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Coordinates')}}</th>
			<th>{{__('Fecha de alta')}}</th>
			<th>{{__('Height')}}</th>
			<th>{{__('Confirm')}}</th>
			<th>{{__('Observations')}}</th>
			<th>Enclave</th>
			<th>{{__('Action')}}</th>
		</tr>
	</thead>
</table>

<script>
$(document).ready(function(){
	var localeJquery ='{{ config('app.locale') }}';

	if(localeJquery == "es"){
		$("#miDataTable").DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: "{{ route('getDataAjaxLocalizacion', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','coord_utm');
				//fecha_alta
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','altura');
				//confirmada
				$( row ).find('td:eq(4)').attr('contenteditable','true');
				$( row ).find('td:eq(4)').attr('data-campo','observacion');
				
				$( row ).find('td:eq(5)').attr('data-campoList','enclaves');
    		},
			columns:[
				{ data: "coord_utm" , name:"coord_utm"},
				{ data: "fecha_alta", name:"fecha_alta"},
				{ data: "altura", name:"altura"},
				{ data: "confirmada", name:"confirmada"},
				{ data: "observacion", name:"observacion"},
				{ data: "enclaves", name:"enclaves"},
				{ data: "accion", name:"accion"},
			],
			columnDefs: [
                { "targets": [1,2,3,4,5,6], "searchable": false },
            ],
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
		$("#miDataTable").DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: "{{ route('getDataAjaxLocalizacion', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','coord_utm');
				//fecha_alta
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','altura');
				//confirmada
				$( row ).find('td:eq(4)').attr('contenteditable','true');
				$( row ).find('td:eq(4)').attr('data-campo','observacion');
				
				$( row ).find('td:eq(5)').attr('data-campoList','enclaves');
    		},
			columns:[
				{ data: "coord_utm" , name:"coord_utm"},
				{ data: "fecha_alta", name:"fecha_alta"},
				{ data: "altura", name:"altura"},
				{ data: "confirmada", name:"confirmada"},
				{ data: "observacion", name:"observacion"},
				{ data: "enclaves", name:"enclaves"},
				{ data: "accion", name:"accion"},
			],
			columnDefs: [
                { "targets": [1,2,3,4,5,6], "searchable": false },
            ]
		 });
	}

	//Abrir y cerrar modal
		$(".button.is-warning").click(function(){
			$("#modalLocalizacion").addClass("is-active");
			$("#titleLocalizacionModal").text("{{__('New location')}}");
			$(".formLocalizacion").show();
			$("#footerLocalizacionCrear").show();
			$(".mensajeLocalizacionBorrar").hide();
			$("#footerLocalizacionBorrar").hide();
			
		});
		$(".delete").click(function(){
			$("#modalLocalizacion").removeClass();
			$("#modalLocalizacion").addClass("modal");
			$(".formLocalizacion")[0].reset(); //Reiniciamos el formulario
		});
		$(".button.is-danger").click(function(){
			$('.delete').trigger("click");
		});
		//END Abrir y cerrar modal

		//Abrir y cerrar modal help
		$(".buttonHelp").click(function(){
     		$("#helpModal").addClass("is-active");
    	});
    	$(".delete").click(function(){
        	$("#helpModal").removeClass();
		$("#helpModal").addClass("modal");
    	});
		//END Abrir y cerrar modal help
	
	//Boton de nuevo registro
		$("#footerLocalizacionCrear .button.is-success").click(function(){ 
				
			var coordenas = $("#coord_utm").val();
			var fechaAlta = $("#fecha_alta").val();
			var altura = $("#altura").val();
			var enclave = $(".enclaves").children("option:selected").val();
			var confirmar;
			
			if($(".confirmar").prop("checked")){
				confirmar = 1;
			}else{
				confirmar = 0;
			}
	
			var observacion = $(".textarea").val();
			
			
			$.ajax({
				type:"POST",
				url:"{{route('addAjaxLocalizacion', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					coord_utm: coordenas,
					fecha_alta: fechaAlta,
					altura: altura,
					enclave_id: enclave,
					confirmada: confirmar,
					observacion: observacion,
					
					//avistador_id: 1, AVISTADOR ESTA PENDIENTE DE SER INTEGRADO
				},
				success:function(notification){
					
					if(notification.type=='error'){
						toastr.error(notification.message);
					}else{
						$('.delete').trigger("click");
						$('#miDataTable').DataTable().ajax.reload();

						if(localeJquery == "es"){
							toastr.success("Nueva localizacion creada");
						}else{
							toastr.success("New location created");
						}

					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
				
		});
	//END Boton de nuevo registro
	
	//Editar campos en la tabla
		$("#miDataTable tbody").on("keypress","td",function(e){ 
			if(e.which == 13) { //Si pulsamos enter
				e.preventDefault(); //Esto evita que haga un salto de linea
				$(this).trigger("blur"); //Activa el evento blur
			}
		});
		
		$("#miDataTable tbody").on("blur",".enclaveTableList",function(){ //enclaves
			var id = $(this).closest("tr").attr("id");
			var enclave = $(this).children("option:selected").val();
			var campo = "enclave_id";
			
			editar(id,campo,enclave);
			
		});
	
		$("#miDataTable tbody").on("blur","#fecha_altaTable",function(){ //fecha
			var id = $(this).closest("tr").attr("id");
			var campo = $(this).data("campo");
			var valor = $(this).val();
			
			editar(id,campo,valor);
			
		});
	
		$("#miDataTable tbody").on("click",".confirmarTable",function(){ //confirmar
			var id = $(this).closest("tr").attr("id");
			var campo = $(this).data("campo");
			var valor;
			
			if($(this).prop("checked")){
				valor = 1;
			}else{
				valor = 0;
			}
			
			editar(id,campo,valor);
			
		});
	
		
		$("#miDataTable tbody").on("blur","td[contenteditable='true']",function(){
			var id = $(this).closest("tr").attr("id");
			var campo = $(this).data("campo");
			var valor = $(this).text();
			
			editar(id,campo,valor);
			
		});
	
	
		function editar(id,campo, valor) //Funcion para editar por ajax
		{
			$.ajax({
				type:"POST",
				url:"{{route('updateAjaxLocalizacion', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_localizacion: id,
					campo: campo,
					texto_campo: valor,
				},
				success:function(){
					if(localeJquery == "es"){
						toastr.success("Localizacion editada");
					}else{
						toastr.success("Edited location");
					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
		}
	
	//END Editar campos en la tabla 
	
	
	
	//Boton de borrar registro, abre un modal y pregunta si quieres eliminar el registro
		$("#miDataTable tbody").on("click","#borrarLocalizacion",function(){
			
			$("#modalLocalizacion").addClass("is-active");
			$("#titleLocalizacionModal").text("{{__('Delete location')}}");
			$(".mensajeLocalizacionBorrar").show();
			$("#footerLocalizacionBorrar").show();
			$(".formLocalizacion").hide();
			$("#footerLocalizacionCrear").hide();
			
			$(".idRowLocalizacion").val($(this).closest("tr").attr("id"));
			
		})
		//END Boton de borrar registro
		
		//Boton que elima el registro
		$("#footerLocalizacionBorrar .button.is-success").click(function(){
			var id = $(".idRowLocalizacion").val();
			var tr = $("tr[id="+id+"]");
			
			$.ajax({
				type:"POST",
				url:"{{route('deleteAjaxLocalizacion', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_localizacion: id,
				},
				success: function(){
					$('.delete').trigger("click");
					tr.fadeOut();

					if(localeJquery == "es"){
						toastr.success("Localizacion borrada");
					}else{
						toastr.success("Deleted Location");
					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			})
		});
		//END Boton que elimina el registro
	
});
</script>

@endsection