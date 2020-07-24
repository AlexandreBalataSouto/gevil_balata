<?php

namespace App\Http\Controllers;

use App\Foto;
use App\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ValidarFormFotosRequest;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = Foto::all();
		return view("fotos.index",compact("fotos"));
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$especies = Especie::all();
        return view('fotos.create', compact('especies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarFormFotosRequest $request, $lang)
    {
		$foto = new Foto();

		if ($request->hasFile('imagen')) {													// si se ha seleccionado una imagen en el form
			$request->imagen->storeAs('public/fotos_especies', $request->imagen->getClientOriginalName());	// guardo el fichero
		  }

		  $foto->titulo = $request->imagen->getClientOriginalName();						// guardo el nombre del fichero que se subió
		  $foto->especie_id = $request->get('especie_id');									// guardo la id de la especie 
		  $foto->descripcion = $request->get('descripcion');								// guardo la descripción

		  $foto->save();																	// guardo el registro foto con todos sus campos
		  return redirect($lang.'/especies/fotos/'.$foto->especie_id)->with('success', 'Foto añadida con exito.');
		
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$fotos = Foto::where('especie_id',$this->id);
		//return view("fotos.index",compact("fotos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$foto = Foto::find($id);
		
        return view('fotos.edit', compact("foto"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$lang = \App::getLocale();
		
		if($lang == "es"){
			$exito = array(
			'message' => '¡Foto '.$id.' editada con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => '¡La foto no se puede modificar!',
			'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Photo  '.$id.' successfully edited!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The photo cannot be modified!',
			'alert-type' => 'error'
			);
		}
		
		try {
			$foto = $request->all();
			Foto::find($id)->update($foto);
			return redirect('fotos')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect('fotos')->with($error);
		}	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
		if($lang == "es"){
			$exito = array(
			'message' => '¡Foto '.$id.' eliminada con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => '¡La foto '.$id.' no es eliminable por sus vinculos en otras tablas!',
			'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Photo  '.$id.' successfully removed!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The photo '.$id.' it is not removable by its links in other tables!',
			'alert-type' => 'error'
			);
		}
		
		try {
			$foto = Foto::find($id);	//Obtengo los datos de la foto que voy a borrar
			$nombre_fichero = $foto->titulo;// obtengo el titulo = nombre del fichero
			Storage::delete('public/fotos_especies/'.$nombre_fichero);	// borro el fichero de la foto
			Foto::find($id)->delete();									// luego borro el registro de la base de datos
			//return redirect('fotos')->with($exito);
			return redirect($lang.'/especies/fotos/'.$foto->especie_id)->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			//return redirect('fotos')->with($error);
			return redirect($lang.'/especies/fotos/'.$foto->especie_id)->with($error);
		}
    }
	
		/**
     * Actualizaciรณn de un campo via AJAX.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
	public function actualizarCampo(Request $request){
		
		$id=$request->input("id",null);										// es == Input::get('id', null);  ? valor nulo si no hay valor
		$campo=$request->input("campo",null);
		$valor=$request->input("valor",null);

		if ($id!=null && $campo!=null){	
			Foto::find($id)->update([$campo => $valor]);
		}
		
	}	
}
