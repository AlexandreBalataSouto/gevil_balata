@extends('layouts.template')
@section('contenido')
<br>
<div>
	<h2 class="tituloH2">{{__('Control methods')}}</h2>
	<button class="button is-info is-rounded buttonHelp"><i class="fas fa-question"></i></button>
	<button class="button is-warning botonAdd">{{__('New control method')}}</button> <!--Este boton activa el modal-->
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
				{!!__('This is a <strong>BREAD of Control methods</strong>, you can edit all the fields of the table <strong>dynamically</strong>, for example in the field <strong>Observations</strong>click on any register, then type something and now press enter or click outside the field.')!!}
			</p>
		</section>
	</div>
</div>

<div class="modal" id="modalMetodoControl">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title" id="titleMetodoControlModal">{{__('New control method')}}</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
		<form class="formMetodoControl">
			<!--Nombre-->
			<div class="field">
			  <label class="label">{{__('Name of the Control Method')}}</label>
			  <div class="control">
				<input id="nombre_metodo_control" class="input" type="text" placeholder="{{__('what ever')}}">
			  </div>
			</div>
			<!--Descripcion-->
			<div class="field">
			  <label class="label">{{__('Descriptions')}}</label>
			  <div class="control">
				<textarea class="textarea" placeholder="{{__('Descriptions')}}" id="descripcion_metodo_control"></textarea>
			  </div>
			</div>
			<!--Observaciones-->
			<div class="field">
			  <label class="label">{{__('Observations')}}</label>
			  <div class="control">
				<textarea class="textarea" placeholder="{{__('Observations')}}" id="observacion_metodo_control"></textarea>
			  </div>
			</div>
		</form>
		<span class="mensajeMetodoControlBorrar">{{__('Do you want to remove this Control Method?')}}</span>
		<input type="hidden" value="0" class="idRowMetodoControl">
    </section>
    <footer class="modal-card-foot" id="footerMetodoControlCrear">
      <button class="button is-success">{{__('Save')}}</button>
      <button class="button is-danger">{{__('Cancel')}}</button>
    </footer>
	<footer class="modal-card-foot" id="footerMetodoControlBorrar">
      <button class="button is-success">{{__('Accept')}}</button>
      <button class="button is-danger">{{__('Cancel')}}</button>
    </footer>
  </div>
</div>

<table id="miDataTable">
	<thead>
		<tr>
			<th>{{__('Name Method')}}</th>
			<th>{{__('Descriptions')}}</th>
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
			ajax: "{{ route('getDataAjaxMetodoControl', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','nombre_metodo_control');
				$( row ).find('td:eq(1)').attr('contenteditable','true');
				$( row ).find('td:eq(1)').attr('data-campo','descripcion');
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','observacion');
    		},
			columns:[
				{ data: "nombre_metodo_control"},
				{ data: "descripcion"},
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
			ajax: "{{ route('getDataAjaxMetodoControl', app()->getLocale()) }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','nombre_metodo_control');
				$( row ).find('td:eq(1)').attr('contenteditable','true');
				$( row ).find('td:eq(1)').attr('data-campo','descripcion');
				$( row ).find('td:eq(2)').attr('contenteditable','true');
				$( row ).find('td:eq(2)').attr('data-campo','observacion');
    		},
			columns:[
				{ data: "nombre_metodo_control"},
				{ data: "descripcion"},
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
			$("#modalMetodoControl").addClass("is-active");
			$("#titleMetodoControlModal").text("{{__('New control method')}}");
			$(".formMetodoControl").show();
			$("#footerMetodoControlCrear").show();
			$(".mensajeMetodoControlBorrar").hide();
			$("#footerMetodoControlBorrar").hide();
			
		});
		$(".delete").click(function(){
			$("#modalMetodoControl").removeClass();
			$("#modalMetodoControl").addClass("modal");
			$(".formMetodoControl")[0].reset(); //Reiniciamos el formulario
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
		$("#footerMetodoControlCrear .button.is-success").click(function(){ 
				
			var nombreMetodoControl = $("#nombre_metodo_control").val();
			var descripcion = $("#descripcion_metodo_control").val();
			var observacion = $("#observacion_metodo_control").val();
			
			$.ajax({
				type:"POST",
				url:"{{route('addAjaxMetodoControl', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					nombre_metodo_control: nombreMetodoControl,
					descripcion: descripcion,
					observacion: observacion,
				},
				success:function(notification){
					if(notification.type=='error'){
						toastr.error(notification.message);
					}else{
						$('.delete').trigger("click");
						$('#miDataTable').DataTable().ajax.reload();

						if(localeJquery == "es"){
							toastr.success("Nuevo metodo de control creado");
						}else{
							toastr.success("New control method created");
						}		
					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
				
		});
		//END Boton de nuevo registro
		
		//Editar campos en la tabla MENOS MUNICIPIOS
		$("#miDataTable tbody").on("keypress","td",function(e){ 
			if(e.which == 13) { //Si pulsamos enter
				e.preventDefault(); //Esto evita que haga un salto de linea
				$(this).trigger("blur"); //Activa el evento blur
			}
		});
		
		
		$("#miDataTable tbody").on("blur","td[contenteditable='true']",function(){
			var id = $(this).closest("tr").attr("id");
			var campo = $(this).data("campo");
			var valor = $(this).text();
			
			editar(id,campo,valor);
			
		});
		//END Editar campos en la tabla MENOS MUNICIPIOS
		
		function editar(id,campo, valor) //Funcion para editar por ajax
		{
			$.ajax({
				type:"POST",
				url:"{{route('updateAjaxMetodoControl', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_metodo_control: id,
					campo: campo,
					texto_campo: valor,
				},
				success:function(){
					if(localeJquery == "es"){
						toastr.success("Metodo de control editado");
					}else{
						toastr.success("Edited Control Method");
					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
		}
		

		//Boton de borrar registro, abre un modal y pregunta si quieres eliminar el registro
		$("#miDataTable tbody").on("click","#borrarMetodoControl",function(){
			
			$("#modalMetodoControl").addClass("is-active");
			$("#titleMetodoControlModal").text("{{__('Remove control method')}}");
			$(".mensajeMetodoControlBorrar").show();
			$("#footerMetodoControlBorrar").show();
			$(".formMetodoControl").hide();
			$("#footerMetodoControlCrear").hide();
			
			$(".idRowMetodoControl").val($(this).closest("tr").attr("id"));
			
		})
		//END Boton de borrar registro
		
		//Boton que elima el registro
		$("#footerMetodoControlBorrar .button.is-success").click(function(){
			var id = $(".idRowMetodoControl").val();
			var tr = $("tr[id="+id+"]");
			
			$.ajax({
				type:"POST",
				url:"{{route('deleteAjaxMetodoControl', app()->getLocale())}}",
				data:{
					_token: "{{csrf_token()}}",
					id_metodo_control: id,
				},
				success: function(){
					$('.delete').trigger("click");
					tr.fadeOut();
					
					if(localeJquery == "es"){
						toastr.success("Metodo de control borrado");
					}else{
						toastr.success("Control Method Deleted");
					}
				}
			}).fail(function(){
				toastr.error("ERROR");
			})
		});
		//END Boton que elima el registro
		
	});//END ready function
	
</script>

@endsection