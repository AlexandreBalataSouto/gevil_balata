@extends('layouts.template')
 
@section('contenido')
<br>
<div>
    <div>
        <h2>{{__('Edit species')}}</h2>
    </div>
	<div>
		<a href="{{ route('especies.index',app()->getLocale()) }}" class="button is-warning">{{__('Return')}}</a><a href="#guardar" class="button is-warning" style="float:right;" tabindex="0">{{__('Go to the end')}}</a>
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
<form action="{{ route('especies.update', ['language'=>app()->getLocale(),$especie->id_especie]) }}" method="POST" name="update_especie">
  	{{ csrf_field() }}
	<!--Todos los formularios HTML que apuntan a rutas POST, PUT o DELETE 
	que se definen en el archivo de rutas web deben incluir un campo de token CSRF. 
	De lo contrario, la solicitud sera rechazada.-->
  	@method('PATCH')
	
	<div class="field is-horizontal">
	   <div class="field-body">
		<div class="field">
		  <label class="label">{{__('Common name')}}</label>
		  <div class="control {{ $errors->first('nombre_comun', 'error') }}">
			<input class="input" type="text" name="nombre_comun" value="{{ old('nombre_comun', $especie->nombre_comun) }}" placeholder="{{__('Common name')}}">
		  </div>
		</div>
		<div class="field">
		  <label class="label">{{__('Scientific name')}}</label>
		  <div class="control {{ $errors->first('nombre_cientifico', 'error') }}">
			<input class="input" type="text" name="nombre_cientifico" value="{{ old('nombre_cientifico', $especie->nombre_cientifico) }}" placeholder="{{__('Scientific name')}}">
		  </div>
		</div>
		<div class="field">
		  <label class="label">{{__('Family')}}</label>
		  <div class="control {{ $errors->first('familia', 'error') }}">
			<input class="input" type="text" name="familia" value="{{ old('familia', $especie->familia) }}" placeholder="{{__('Family')}}">
		  </div>
		</div>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Description')}}</label>
	  <div class="control {{ $errors->first('descripcion', 'error') }}">
		<textarea class="textarea" name="descripcion" placeholder="{{__('Description')}}">{{ old('descripcion', $especie->descripcion) }}</textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Origin')}}</label>
	  <div class="control {{ $errors->first('origen', 'error') }}">
		<!--<textarea class="textarea" name="origen" placeholder="Origen">{{ old('origen', $especie->origen) }}</textarea>-->
		<input class="input" type="text" name="origen" value="{{ old('origen', $especie->origen) }}" placeholder="{{__('Origin')}}">
	  </div>
	</div>
	<div class="field is-horizontal" style="display:inline-flex;margin-top:10px;margin-bottom:15px;">
	  <div class="field-label is-normal">
		<label class="label">{{__('Legal status')}}</label>
	  </div>
	  <div class="control {{ $errors->first('estatus_legal', 'error') }}">
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="invasora" {{ old('estatus_legal', $especie->estatus_legal) == 'invasora' ? 'checked' : ''}}>
		  {{__('Invasive')}}
		</label>
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="potencialmente invasora" {{ old('estatus_legal', $especie->estatus_legal) == 'potencialmente invasora' ? 'checked' : ''}}>
		  {{__('Potentially invasive')}}
		</label>
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="bajo vigilancia" {{ old('estatus_legal', $especie->estatus_legal) == 'bajo vigilancia' ? 'checked' : ''}}>
		  {{__('Under surveillance')}}
		</label>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Legal Status Detail')}}</label>
	  <div class="control {{ $errors->first('detalle_estatus_legal', 'error') }}">
		<textarea class="textarea" name="detalle_estatus_legal" placeholder="{{__('Legal Status Detail')}}">{{ old('detalle_estatus_legal', $especie->detalle_estatus_legal) }}</textarea>
	  </div>
	</div>
	<div class="field is-horizontal" style="display:inline-flex;margin-top:10px;margin-bottom:15px;">
	  <div class="field-label is-normal">
		<label class="label">{{__('Risk')}}</label>
	  </div>
	  <div class="control {{ $errors->first('riesgo', 'error') }}">
		<label class="radio">
		  <input type="radio" name="riesgo" value="alto" {{ old('riesgo', $especie->riesgo) == 'alto' ? 'checked' : ''}}>{{__('high')}}
		</label>
		<label class="radio">
		  <input type="radio" name="riesgo" value="medio" {{ old('riesgo', $especie->riesgo) == 'medio' ? 'checked' : ''}}>{{__('medium')}}
		</label>
		<label class="radio">
		  <input type="radio" name="riesgo" value="bajo" {{ old('riesgo', $especie->riesgo) == 'bajo' ? 'checked' : ''}}>{{__('low')}}
		</label>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Distribution')}}</label>
	  <div class="control {{ $errors->first('distribucion', 'error') }}">
		<textarea class="textarea" name="distribucion" placeholder="{{__('Distribution')}}">{{ old('distribucion', $especie->distribucion) }}</textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Sensitive areas')}}</label>
	  <div class="control {{ $errors->first('zonas_sensibles', 'error') }}">
		<textarea class="textarea" name="zonas_sensibles" placeholder="{{__('Sensitive areas')}}">{{ old('zonas_sensibles', $especie->zonas_sensibles) }}</textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Control methods')}}</label>
	  <div class="control {{ $errors->first('metodos_control', 'error') }}">
		<textarea class="textarea" name="metodos_control" placeholder="{{__('Control methods')}}">{{ old('metodos_control', $especie->metodos_control) }}</textarea>
	  </div>
	</div>
	<div class="field is-horizontal">
	   <div class="field-body">
		<div class="field">
		  <label class="label">{{__('Start work period')}}</label>
		  <div class="control {{ $errors->first('ini_periodo_trabajo', 'error') }}">
			<input class="input" type="date" name="ini_periodo_trabajo" value="{{ old('ini_periodo_trabajo', $especie->ini_periodo_trabajo) }}" placeholder="{{__('Approximate date')}}">
		  </div>
		</div>
		<div class="field">
		  <label class="label">{{__('End of work period')}}</label>
		  <div class="control {{ $errors->first('fin_periodo_trabajo', 'error') }}">
			<input class="input" type="date" name="fin_periodo_trabajo" value="{{ old('fin_periodo_trabajo', $especie->fin_periodo_trabajo) }}" placeholder="{{__('Approximate date')}}">
		  </div>
		</div>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Bibliographic references')}}</label>
	  <div class="control {{ $errors->first('ref_biblio', 'error') }}">
		<textarea class="textarea" name="ref_biblio" placeholder="{{__('Bibliographic references')}}">{{ old('ref_biblio', $especie->ref_biblio) }}</textarea>
	  </div>
	</div>
	
  <button type="submit" id="guardar" class="button is-warning" tabindex="1">{{__('Save Changes')}}</button>
  <a href="{{ route('especies.index',app()->getLocale()) }}" class="button is-warning">{{__('Cancel')}}</a>  
</form>

<script><!--Script para aumentar el tamaño de los textarea segun se introduzca más contenido
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