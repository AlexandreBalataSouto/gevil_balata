@extends('layouts.template')
@section('contenido')
<br>
<div>
	<h2 class="tituloH2">Enclaves</h2>
	<button class="button is-info is-rounded buttonHelp"><i class="fas fa-question"></i></button>
	<button class="button is-warning botonAdd">{{__('New enclave')}}</button>
	<!--Este boton activa el modal-->
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
				{!!__('This is a <strong>BREAD of Enclaves</strong>, you can edit all the fields of the table <strong>dynamically</strong>, for example in the field <strong>Observations</strong>click on any register, then type something and now press enter or click outside the field.')!!}
			</p>
		</section>
	</div>
</div>

<div class="modal" id="modalEnclave">
	<div class="modal-background"></div>
	<div class="modal-card">
		<header class="modal-card-head">
			<p class="modal-card-title" id="titleEnclaveModal">{{__('Enclave name')}}</p>
			<button class="delete" aria-label="close"></button>
		</header>
		<section class="modal-card-body">
			<form class="formEnclave">
				<!--Nombre-->
				<div class="field">
					<label class="label">{{__('Enclave name')}}</label>
					<div class="control">
						<input id="nombre_enclave" class="input" type="text" placeholder="{{__('what ever')}}">
					</div>
				</div>
				<!--Municipios-->
				<div class="field">
					<label class="label">{{__('Municipality')}}</label>
					<div class="control">
						<div class="select">
							<select class="municipio">
								<option disabled selected>{{__('Select municipality')}}</option>
								<option value="Arrecife">Arrecife</option>
								<option value="Haria">Haria</option>
								<option value="San Bartolome">San Bartolome</option>
								<option value="Teguise">Teguise</option>
								<option value="Tias">Tias</option>
								<option value="Tinajo">Tinajo</option>
								<option value="Yaiza">Yaiza</option>
							</select>
						</div>
					</div>
				</div>
				<!--Observaciones-->
				<div class="field">
					<label class="label">{{__('Observations')}}</label>
					<div class="control">
						<textarea class="textarea" placeholder="{{__('Observations')}}"></textarea>
					</div>
				</div>
			</form>
			<span class="mensajeEnclaveBorrar">{{__('Do you want to remove this enclave?')}}</span>
			<input type="hidden" value="0" class="idRowEnclave">
		</section>
		<footer class="modal-card-foot" id="footerEnclaveCrear">
			<button class="button is-success">{{__('Save')}}</button>
			<button class="button is-danger">{{__('Cancel')}}</button>
		</footer>
		<footer class="modal-card-foot" id="footerEnclaveBorrar">
			<button class="button is-success">{{__('Accept')}}</button>
			<button class="button is-danger">{{__('Cancel')}}</button>
		</footer>
	</div>
</div>

<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Enclave name')}}</th>
			<th>{{__('Municipality')}}</th>
			<th>{{__('Observations')}}</th>
			<th>{{__('Action')}}</th>
		</tr>
	</thead>
</table>

<script>
	$(document).ready( function () {
		var localeJquery ='{{ config('app.locale') }}';
		
		if(localeJquery == "es"){
			$("#miDataTable").DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			ajax: "{{ route('getDataAjaxEnclave', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','nombre_enclave');
				
				$( row ).find('td:eq(1)').attr('data-campoList','municipio');
				
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','observacion');
    		},
			columns:[
				{ data: "nombre_enclave"},
				{ data: "municipio"},
				{ data: "observacion"},
				{ data: "accion"},
			],
			columnDefs: [
                { "targets": [1,2,3], "searchable": false },
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
			ajax: "{{ route('getDataAjaxEnclave', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','nombre_enclave');
				
				$( row ).find('td:eq(1)').attr('data-campoList','municipio');
				
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','observacion');
    		},
			columns:[
				{ data: "nombre_enclave"},
				{ data: "municipio"},
				{ data: "observacion"},
				{ data: "accion"},
			],
			columnDefs: [
                { "targets": [1,2,3], "searchable": false },
            ]
		 });
		}
		
		//Abrir y cerrar modal
		$(".button.is-warning").click(function(){
			$("#modalEnclave").addClass("is-active");
			$("#titleEnclaveModal").text("{{__('Enclave name')}}");
			$(".formEnclave").show();
			$("#footerEnclaveCrear").show();
			$(".mensajeEnclaveBorrar").hide();
			$("#footerEnclaveBorrar").hide();
			
		});
		$(".delete").click(function(){
			$("#modalEnclave").removeClass();
			$("#modalEnclave").addClass("modal");
			$(".formEnclave")[0].reset(); //Reiniciamos el formulario
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
		$("#footerEnclaveCrear .button.is-success").click(function(){ 
				
			var nombreEnclave = $("#nombre_enclave").val();
			var municipio = $(".municipio").children("option:selected").val();
			var observacion = $(".textarea").val();
			
			
			$.ajax({
				type:"POST",
				url:"{{route('addAjaxEnclave', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					nombre_enclave: nombreEnclave,
					municipio: municipio,
					observacion: observacion,
				},
				success:function(notification){
					
					if(notification.type=='error'){
						toastr.error(notification.message);
					}else{
						
						$('.delete').trigger("click");
						$('#miDataTable').DataTable().ajax.reload();
					
						toastr.success("{{__('New enclave created')}}");
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
		
		$("#miDataTable tbody").on("blur",".municipioTableList",function(e){
			var id = $(this).closest("tr").attr("id");
			var municipio = $(this).children("option:selected").val();
			var campo = "municipio";
			
			editar(id,campo,municipio);
			
		});
		
		$("#miDataTable tbody").on("blur","td[contenteditable='true']",function(){
			var id = $(this).closest("tr").attr("id");
			var campo = $(this).data("campo");
			var valor = $(this).text();
			
			editar(id,campo,valor);
			
		});
		//END Editar campos en la tabla
		
		function editar(id,campo, valor) //Funcion para editar por ajax
		{
			$.ajax({
				type:"POST",
				url:"{{route('updateAjaxEnclave', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_enclave: id,
					campo: campo,
					texto_campo: valor,
				},
				success:function(){
					toastr.success("{{__('Edited Enclave')}}");
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
		}
		

		//Boton de borrar registro, abre un modal y pregunta si quieres eliminar el registro
		$("#miDataTable tbody").on("click","#borrarEnclave",function(){
			
			$("#modalEnclave").addClass("is-active");
			$("#titleEnclaveModal").text("{{__('Remove enclave')}}");
			$(".mensajeEnclaveBorrar").show();
			$("#footerEnclaveBorrar").show();
			$(".formEnclave").hide();
			$("#footerEnclaveCrear").hide();
			
			$(".idRowEnclave").val($(this).closest("tr").attr("id"));
			
		})
		//END Boton de borrar registro
		
		//Boton que elima el registro
		$("#footerEnclaveBorrar .button.is-success").click(function(){
			var id = $(".idRowEnclave").val();
			var tr = $("tr[id="+id+"]");
			
			$.ajax({
				type:"POST",
				url:"{{route('deleteAjaxEnclave', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_enclave: id,
				},
				success: function(notification){
					
					if(notification.type=='error'){
						toastr.error(notification.message);
					}else{
						$('.delete').trigger("click");
						tr.fadeOut();
						toastr.success("{{__('Removed enclave')}}");
					}
				}
			}).fail(function(){
				toastr.error("Error");
			})
		});
		//END Boton que elima el registro
		
	});//END ready function
	
</script>

@endsection