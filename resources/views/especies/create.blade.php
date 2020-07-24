@extends('layouts.template')
 
@section('contenido')
<br>
<div>
    <div>
        <h2>{{__('Add species')}}</h2>
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
<form action="{{ route('especies.store',app()->getLocale()) }}" method="POST" name="add_especie">
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
	   <div class="field-body">
		<div class="field">
		  <label class="label">{{__('Common name')}}</label>
		  <div class="control">
			<input class="input" type="text" name="nombre_comun" value="{{ old('nombre_comun') }}" placeholder="{{__('Common name')}}">
		  </div>
		</div>	  
		<div class="field"> 
		  <label class="label">{{__('Scientific name')}}</label>
		  <div class="control">
			<input class="input" type="text" name="nombre_cientifico" value="{{ old('nombre_cientifico') }}" placeholder="{{__('Scientific name')}}">
		  </div>
		</div>
		<div class="field">
		  <label class="label">{{__('Family')}}</label>
		  <div class="control">
			<input class="input" type="text" name="familia" value="{{ old('familia') }}" placeholder="{{__('Family')}}">
		  </div>
		</div>
		</div> 
	</div>
	<div class="field">
	  <label class="label">{{__('Description')}}</label>
	  <div class="control">
		<textarea class="textarea" name="descripcion" value="{{ old('descripcion') }}" placeholder="{{__('Description')}}"></textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Origin')}}</label>
	  <div class="control">  
		<input class="input" type="text" name="origen" value="{{ old('origen') }}" placeholder="{{__('Origin')}}">
	  </div>
	</div>
	<div class="field is-horizontal" style="display:inline-flex;margin-top:10px;margin-bottom:15px;">
	  <div class="field-label is-normal">
		<label class="label">{{__('Legal status')}}</label>
	  </div>
	  <div class="control">
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="invasora">
		  {{__('Invasive species')}}
		</label>
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="potencialmente invasora">
		  {{__('Foreign species')}}
		</label>
		<label class="radio">
		  <input type="radio" name="estatus_legal" value="bajo vigilancia">
			{{__('Under surveillance')}}
		</label>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Legal Status Detail')}}</label>
	  <div class="control">
		<textarea class="textarea" name="detalle_estatus_legal" value="{{ old('detalle_estatus_legal') }}" placeholder="{{__('Legal Status Detail')}}"></textarea>
	  </div>
	</div>
	<div class="field is-horizontal" style="display:inline-flex;margin-top:10px;margin-bottom:15px;">
	  <div class="field-label is-normal">
		<label class="label">{{__('Risk')}}</label>
	  </div>
	  <div class="control">
		<label class="radio">
		  <input type="radio" name="riesgo" value="{{ old('riesgo') }}">
		  {{__('high')}}
		</label>
		<label class="radio">
		  <input type="radio" name="riesgo" value="{{ old('riesgo') }}">
		  {{__('medium')}}
		</label>
		<label class="radio">
		  <input type="radio" name="riesgo" value="{{ old('riesgo') }}">
		   {{__('low')}}
		</label>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Distribution')}}</label>
	  <div class="control">
		<textarea class="textarea" name="distribucion" value="{{ old('distribucion') }}" placeholder="{{__('Distribution')}}"></textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Sensitive areas')}}</label>
	  <div class="control">
		<textarea class="textarea" name="zonas_sensibles" value="{{ old('zonas_sensibles') }}" placeholder="{{__('Sensitive areas')}}"></textarea>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Control methods')}}</label>
	  <div class="control">
		<textarea class="textarea" name="metodos_control" value="{{ old('metodos_control') }}" placeholder="{{__('Control methods')}}"></textarea>
	  </div>
	</div>
	<div class="field is-horizontal">
	   <div class="field-body">
		<div class="field">
		  <label class="label">{{__('Start work period')}}</label>
		  <div class="control">
			<input class="input" type="date" name="ini_periodo_trabajo" value="{{ old('ini_periodo_trabajo') }}" placeholder="{{__('Approximate date')}}">
		  </div>
		</div>
		<div class="field">
		  <label class="label">{{__('End of work period')}}</label>
		  <div class="control">
			<input class="input" type="date" name="fin_periodo_trabajo" value="{{ old('fin_periodo_trabajo') }}" placeholder="{{__('Approximate date')}}">
		  </div>
		</div>
	  </div>
	</div>
	<div class="field">
	  <label class="label">{{__('Bibliographic references')}}</label>
	  <div class="control">
		<textarea class="textarea" name="ref_biblio" value="{{ old('ref_biblio') }}" placeholder="{{__('Bibliographic references')}}"></textarea>
	  </div>
	</div>
  <button type="submit" id="guardar" class="button is-warning" tabindex="1">{{__('Save Changes')}}</button>
  <a href="{{ route('especies.index',app()->getLocale()) }}" class="button is-warning">{{__('Cancel')}}</a>  
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