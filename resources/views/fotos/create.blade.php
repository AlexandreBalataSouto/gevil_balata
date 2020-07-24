@extends('layouts.template')
@section('contenido')
<br>
<div>
    <div>
        <h2>{{__('Add photo')}}</h2>
    </div>
	<div>
		<a href="{{ route('especies.index', app()->getLocale()) }}" class="button is-warning">{{__('Return to species list')}}</a>  
	</div> 
</div>
<br>
<form action="{{ route('fotos.store', app()->getLocale()) }}" method="POST" name="add_foto" enctype="multipart/form-data">
	{{ csrf_field() }}
	<!--Todos los formularios HTML que apuntan a rutas POST, PUT o DELETE 
	que se definen en el archivo de rutas web deben incluir un campo de token CSRF. 
	De lo contrario, la solicitud sera rechazada.-->
	<!-- print success message after file upload  -->
        @if(Session::has('success'))
            <div class="is-warning">
                {{ Session::get('success') }}
                @php
                    Session::forget('success');
                @endphp
            </div>
        @endif

	<div class="field">
	    <div class="field-body">
			<div id="file-js-foto" class="file has-name eligeFoto">
			  <label class="file-label">
				<input class="file-input" type="file" name="imagen">
				<span class="file-cta">
				  <span class="file-icon">
					<i class="fas fa-upload"></i>
				  </span>
				  <span class="file-label">
					{{__('Choose an image ...')}}
				  </span>
				</span>
				<span class="file-name">
				  {{__('An image has not been chosen')}}
				</span>
			  </label>
			</div>
			<div class="field">
				<label class="label">{{__('Species')}}</label>
				<p class="control">
					<span class="select">
				  		<select name="especie_id" id="especie_id" required>
							<option disabled selected>{{__('Select a species')}}</option>
							@foreach ($especies as $especie)
							<option value="{{$especie->id_especie}}">{{$especie->nombre_comun}}</option>
							@endforeach
				  		</select>
			  		</span>
				</p>
			</div>
			<div class="field">
		</div>
		</div><br>
		<div class="field">
			<label class="label">{{__('Description')}}</label>
			<div class="control is-expanded">
				<input class="input" type="text" name="descripcion" value="{{ old('descripcion') }}" placeholder="{{__('Description')}}">
			</div>
		</div>
	</div>
  <button type="submit" id="guardar" class="button is-warning" tabindex="1">{{__('Save Changes')}}</button>
  <a href="{{ route('getFotosEspecie',['language'=>app()->getLocale(),$especie['id_especie']])}}" class="button is-warning">{{__('Return to previous window')}}</a>  
</form>

<script>
  const fileInput = document.querySelector('#file-js-foto input[type=file]');
  fileInput.onchange = () => {
    if (fileInput.files.length > 0) {
      const fileName = document.querySelector('#file-js-foto .file-name');
      fileName.textContent = fileInput.files[0].name;
    }
  }
</script>
@endsection