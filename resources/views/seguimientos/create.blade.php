@extends('layouts.template')
 
@section('contenido')
<br>
<div>
    <div>
        <h2>{{__('Add tracing')}}</h2>
    </div>
	<div>
		<a href="{{ route('seguimientos.index', app()->getLocale()) }}" class="button is-warning">{{__('Return')}}</a><a href="#guardar" class="button is-warning" style="float:right;" tabindex="0">{{__('Go to the end')}}</a>  
	</div> 
</div>
<br>
@if ($errors->any())
    <div>
        <div class="has-text-danger	">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
<form action="{{ route('seguimientos.store', app()->getLocale()) }}" method="POST" name="add_seguimiento">
	{{ csrf_field() }}
	<!--Todos los formularios HTML que apuntan a rutas POST, PUT o DELETE 
	que se definen en el archivo de rutas web deben incluir un campo de token CSRF. 
	De lo contrario, la solicitud sera rechazada.-->
	<!-- print success message after file upload  -->
       @if(Session::has('success'))
           <div class="alert alert-success">
               {{ Session::get('success') }}
               @php
                   Session::forget('success');
               @endphp
           </div>
       @endif

	<div class="field is-horizontal">
	   	<div id="distribuido">
			<div class="field">
			  	<label class="label">{{__('Species')}}</label>
			  	<div class="select is-fullwidth">
					<select name="especie_id">
						<option value disabled selected>--{{__('Indicates species')}}--</option>
						@foreach ($especies as $especie) 
						{
						<option value="{{ $especie->id_especie }}">{{ $especie->nombre_comun }}</option>
						}
						@endforeach
					</select>
				</div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  	<label class="label">{{__('Location')}}</label>
			  	<div class="select is-fullwidth">
					<select name="localizacion_id">
						<option value disabled selected>--{{__('Indicates location')}}--</option>
						@foreach ($localizaciones as $localizacion) 
						{
						<option value="{{ $localizacion->id_localizacion }}">{{ $localizacion->coord_utm }}</option>
						}
						@endforeach
					</select>
				</div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  <label class="label">{{__('Discharge date')}}</label>
			  <div class="control">
				<input class="input" type="date" name="fecha_alta" value="{{ old('fecha_alta') }}" placeholder="Fecha de alta">
			  </div>
			</div>&nbsp;&nbsp;
			<div class="field">
			  	<label class="label">{{__('Next review')}}</label>
			  	<div class="control">
					<input class="input" type="date" name="proxima_fecha" value="{{ old('fecha_proxima') }}" placeholder="Fecha proxima">
			  	</div>
			</div>
		</div> 
	</div>
	<div class="field is-horizontal">
		<div class="field-body">
			<div class="field">
				<label class="label">{{__('Other species')}}</label>
				<div class="control">
					<textarea class="textarea" name="otras_especies" value="{{ old('otras_especies') }}" placeholder="{{__('Other species')}}"></textarea>
				</div>
			</div>
			<div class="field">
				<label class="label">{{__('Observation')}}</label>
				<div class="control">
					<textarea class="textarea" type="text" name="observaciones" value="{{ old('observaciones') }}" placeholder="{{__('Observation')}}"></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class="field">
	  <label class="label">{{__('Recommendation')}}</label>
	  <div class="control">
		<textarea class="textarea" name="recomendacion" value="{{ old('recomendacion') }}" placeholder="{{__('Recommendation')}}"></textarea>
	  </div>
	</div>

  <button type="submit" id="guardar" class="button is-warning" tabindex="1">{{__('Save change')}}</button>
  <a href="{{ route('seguimientos.index', app()->getLocale()) }}" class="button is-warning">{{__('Cancel')}}</a>  
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