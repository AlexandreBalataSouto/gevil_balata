@extends('layouts.template')
@section('contenido')
<br>
<div>
	<h2 class="tituloH2">Familias</h2>
	<button class="button is-warning botonAdd">Nueva Familia</button> <!--Este boton activa el modal-->
</div>
<br>

<div class="modal" id="modalFamilia">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title" id="titleFamiliaModal">Nueva Familia</p>
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
		<form class="formFamilia">
			<!--Nombre-->
			<div class="field">
			  <label class="label">Nombre de la familia</label>
			  <div class="control">
				<input id="nombre_familia" class="input" type="text" placeholder="Lo que sea">
			  </div>
			</div>
		</form>
		<span class="mensajeFamiliaBorrar">¿Desea eliminar esta familia?</span>
		<input type="hidden" value="0" class="idRowFamilia">
    </section>
    <footer class="modal-card-foot" id="footerFamiliaCrear">
      <button class="button is-success">Guardar</button>
      <button class="button is-danger">Cancelar</button>
    </footer>
	<footer class="modal-card-foot" id="footerFamiliaBorrar">
      <button class="button is-success">Aceptar</button>
      <button class="button is-danger">Cancelar</button>
    </footer>
  </div>
</div>

<table id="miDataTable">
	<thead>
		<tr>
			<th>Nombre familia</th>
			<th>Accion</th>
		</tr>
	</thead>
</table>

<script>
	$(document).ready( function () {
		$("#miDataTable").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('getDataAjaxFamilia') }}",
			createdRow: function( row, data, dataIndex ) {
				$( row ).find('td:eq(0)').attr('contenteditable','true');
				$( row ).find('td:eq(0)').attr('data-campo','nombre_familia');
    		},
			columns:[
				{ data: "nombre_familia"},
				{ data: "accion"},
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
		
		
		//Abrir y cerrar modal
		$(".button.is-warning").click(function(){
			$("#modalFamilia").addClass("is-active");
			$("#titleFamiliaModal").text("Nuevo familia");
			$(".formFamilia").show();
			$("#footerFamiliaCrear").show();
			$(".mensajeFamiliaBorrar").hide();
			$("#footerFamiliaBorrar").hide();
			
		});
		$(".delete").click(function(){
			$("#modalFamilia").removeClass();
			$("#modalFamilia").addClass("modal");
			$(".formFamilia")[0].reset(); //Reiniciamos el formulario
		});
		$(".button.is-danger").click(function(){
			$('.delete').trigger("click");
		});
		//END Abrir y cerrar modal
		
		
		//Boton de nuevo registro
		$("#footerFamiliaCrear .button.is-success").click(function(){ 
				
			var nombreFamilia = $("#nombre_familia").val();
			
			
			$.ajax({
				type:"POST",
				url:"{{url('addAjaxFamilia')}}",
				data:{
					_token: "{{csrf_token()}}",
					nombre_familia: nombreFamilia,
				},
				success:function(){
					$('.delete').trigger("click");
					$('#miDataTable').DataTable().ajax.reload();
					toastr.success("Nueva familia creada");
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
			
			console.log(id);
			console.log(campo);
			console.log(valor);
			
			editar(id,campo,valor);
			
		});
		//END Editar campos en la tabla MENOS MUNICIPIOS
		
		function editar(id,campo, valor) //Funcion para editar por ajax
		{
			$.ajax({
				type:"POST",
				url:"{{url('updateAjaxFamilia')}}",
				data:{
					_token: "{{csrf_token()}}",
					id_familia: id,
					campo: campo,
					texto_campo: valor,
				},
				success:function(){
					toastr.success("Familia editada");
				}
			}).fail(function(){
				toastr.error("ERROR");
			});
		}
		

		//Boton de borrar registro, abre un modal y pregunta si quieres eliminar el registro
		$("#miDataTable tbody").on("click","#borrarFamilia",function(){
			
			$("#modalFamilia").addClass("is-active");
			$("#titleFamiliaModal").text("Eliminar familia");
			$(".mensajeFamiliaBorrar").show();
			$("#footerFamiliaBorrar").show();
			$(".formFamilia").hide();
			$("#footerFamiliaCrear").hide();
			
			$(".idRowFamilia").val($(this).closest("tr").attr("id"));
			
		})
		//END Boton de borrar registro
		
		//Boton que elima el registro
		$("#footerFamiliaBorrar .button.is-success").click(function(){
			var id = $(".idRowFamilia").val();
			var tr = $("tr[id="+id+"]");
			
			$.ajax({
				type:"POST",
				url:"{{url('deleteAjaxFamilia')}}",
				data:{
					_token: "{{csrf_token()}}",
					id_familia: id,
				},
				success: function(){
					$('.delete').trigger("click");
					tr.fadeOut();
					toastr.success("Familia borrada");
				}
			}).fail(function(){
				toastr.error("ERROR");
			})
		});
		//END Boton que elima el registro
		
	});//END ready function
	
</script>

@endsection