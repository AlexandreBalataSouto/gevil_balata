<?php

namespace App\Http\Controllers;

use App\Especie;
use Illuminate\Http\Request;
use App\Http\Requests\ValidarEspecieRequest;
 

class EspecieController extends Controller
{
	/**
     * Muestra las fotos de una especie
     *
     * @return \Illuminate\Http\Response
     */		
	public function fotos($lang,$especie_id)
	{
		$fotos = Especie::find($especie_id)->fotos;
		return view("fotos.index", compact("fotos"));
	}	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especies=Especie::select("id_especie","nombre_comun","nombre_cientifico","estatus_legal","riesgo","ini_periodo_trabajo","fin_periodo_trabajo")->get();
		
		return view("especies.index", compact("especies"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidarEspecieRequest $request)
    {
		$lang = \App::getLocale();
		/*
		$especie=$request->all();
		Especie::create($especie);
		return redirect("especies");
		*/
		// --------------Store con Toastr -----------------------
		if($lang == "es"){
			
			$exito = array(
			'message' => '¡Especie creada con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => '¡La especie no se puede crear!',
			'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Species created successfully!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The species cannot be created!',
			'alert-type' => 'error'
			);
		}
		
		
		try {
			$resultado = Especie::create($request->all());
			return redirect($lang.'/especies')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/especies')->with($error);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function edit($lang,$id)
    {
		$especie = Especie::find($id);
		
        return view('especies.edit', compact("especie"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang,$id)
    {
		if($lang == "es"){
			// ------------ Update con Toastr ---------------- 
			$exito = array(
			'message' => '¡Especie '.$id.' modificada con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => '¡La especie no se puede modificar!',
			'alert-type' => 'error'
			);
		}else{
			// ------------ Update con Toastr ---------------- 
			$exito = array(
			'message' => 'Species '.$id.' successfully modified!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The species cannot be modified!',
			'alert-type' => 'error'
			);
		}
		
		try {
			$especie = $request->all();
			$resultado = Especie::find($id)->update($especie);
			return redirect($lang.'/especies')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/especies')->with($error);
		}	
    }
	
	/**
     * Actualizaciรณn de un campo via AJAX.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
		public function actualizarCampo(Request $request){
		
		$id=$request->input("id");										// es == Input::get('id', null);  ? valor nulo si no hay valor
		$campo=$request->input("campo");
		$valor=$request->input("valor");

		if ($id!=null && $campo!=null){	
			Especie::find($id)->update([$campo => $valor]);
		}
		
	}	

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang, $id)
    {
		
		if($lang == "es"){
			$exito = array(
			'message' => '¡Especie '.$id.' eliminada con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => '¡La especie '.$id.' no es eliminable por sus vinculos en otras tablas!',
			'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Species '.$id.' successfully removed!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The species '.$id.' it is not removable by its links in other tables!',
			'alert-type' => 'error'
			);
		}
		
		try {
			$resultado = Especie::find($id)->delete();
			return redirect($lang.'/especies')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/especies')->with($error);
		}
    }
}
