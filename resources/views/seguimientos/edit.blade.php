@extends('layouts.template')
 
@section('contenido')
<br>
<div>
    <div>
        <h2>{{__('Edit Tracking')}}</h2>
    </div>
	<div>
		<a href="{{ route('seguimientos.index', app()->getLocale()) }}" class="button is-warning">{{__('Return')}}</a><a href="#guardar" class="button is-warning" style="float:right;" tabindex="0">{{__('Go to the end')}}</a>  
	</div> 
</div>
<br>
<form action="{{ route('seguimientos.update', ['language'=>app()->getLocale(),$seguimiento->id_seguimiento]) }}" method="POST" name="update_seguimiento">
	{{ csrf_field() }}
	<!--Todos los formularios HTML que apuntan a rutas POST, PUT o DELETE 
	que se definen en el archivo de rutas web deben incluir un campo de token CSRF. 
	De lo contrario, la solicitud sera rechazada.-->
	<!-- print success message after file upload  -->
  	@method('PATCH')

	<div class="field is-horizontal">
	   	<div id="distribuido">
			<div class="field">
			  	<label class="label">{{__('Species')}}</label>
			  	<div class="select is-fullwidth">
					<select name="especie_id">
						@foreach ($especies as $especie) 
						{
						<option value="{{ $especie->id_especie }}" {{ $especie->id_especie == $seguimiento->especie_id ? 'selected' : '' }}>
							{{ $especie->nombre_comun }}
						</option>
						}
						@endforeach
					</select>
				</div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  	<label class="label">{{__('Location')}}</label>
			  	<div class="select is-fullwidth">
					<select name="localizacion_id">
						@foreach ($localizaciones as $localizacion) 
						{
						<option value="{{ $localizacion->id_localizacion }}" {{ $localizacion->id_localizacion == $seguimiento->localizacion_id ? 'selected' : '' }}>
							{{ $localizacion->coord_utm }}
						</option>
						}
						@endforeach
					</select>
				</div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  <label class="label">{{__('Discharge date')}}</label>
			  <div class="control">
				<input class="input" type="date" name="fecha_alta" value="{{ $seguimiento->fecha_alta }}" placeholder="{{__('Discharge date')}}">
			  </div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  	<label class="label">{{__('Next revision')}}</label>
			  	<div class="control">
					<input class="input" type="date" name="proxima_fecha" value="{{ $seguimiento->proxima_fecha }}" placeholder="{{__('Next revision')}}">
			  	</div>
			</div>
		</div> 
	</div>
	<div class="field is-horizontal">
		<div class="field-body">
			<div class="field">
				<label class="label">{{__('Other species')}}</label>
				<div class="control">
					<textarea class="textarea" name="otras_especies" placeholder="{{__('Other species')}}">{{ $seguimiento->otras_especies }}</textarea>
				</div>
			</div>
			<div class="field">
				<label class="label">{{__('Observations')}}</label>
				<div class="control">
					<textarea class="textarea" name="observaciones" placeholder="{{__('Observations')}}">{{ $seguimiento->observaciones }}</textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="field">
	  <label class="label">{{__('Recommendation')}}</label>
	  <div class="control">
		<textarea class="textarea" name="recomendacion" placeholder="{{__('Recommendation')}}">{{ $seguimiento->recomendacion }}</textarea>
	  </div>
	</div>

  <button type="submit" id="guardar" class="button is-warning" tabindex="1">{{__('Save Changes')}}</button>
  <a href="{{ route('seguimientos.index',app()->getLocale()) }}" class="button is-warning">{{__('Cancel')}}</a>  
</form>

<script><!--Script para aumentar el tamaño de los textarea segun se introduzca más contenido-->
var autoExpand = function (field) {

	// Reset field height
	field.style.height = 'inherit';

	// Get the computed styles for the element
	var computed = window.getComputedStyle(field);

	// Calculate the height
	var height = parseInt(computed.getPropertyValue('border-top-width'), 10)
	             + parseInt(computed.getPropertyValue('padding-top'), 10)
	             + field.scrollHeight
	             + parseInt(computed.getPropertyValue('padding-bottom'), 10)
	             + parseInt(computed.getPropertyValue('border-bottom-width'), 10);

	field.style.height = height + 'px';

};

document.addEventListener('input', function (event) {
	if (event.target.tagName.toLowerCase() !== 'textarea') return;
	autoExpand(event.target);
}, false);
</script>
@endsection