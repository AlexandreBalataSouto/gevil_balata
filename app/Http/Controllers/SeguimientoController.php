<?php

namespace App\Http\Controllers;

use App\Seguimiento;
use App\Especie;
use App\Localizacion;
use App\SeguimientoControles;
use App\MetodoControl;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
	/**
     * Muestra las fotos de una especie
     *
     * @return \Illuminate\Http\Response
     */		
	public function controles($lang,$seguimientoId)
	{
		$seguimientoControles = Seguimiento::find($seguimientoId);
		$allMetodosControl = MetodoControl::all();
		$metodosControl = $seguimientoControles->metodosControl_seguimientos()->get();
        return view('seguimientoControles.index', compact("seguimientoControles","metodosControl","allMetodosControl"));
	}
   
	
	public function storeControles(Request $request,$lang, $id_seguimiento)
	{
		$id_metodo_control = $request->metodo;
		$seguimiento_control = Seguimiento::findOrFail($id_seguimiento);
		$seguimiento_control->metodosControl_seguimientos()->attach($id_metodo_control);
		return redirect($lang.'/seguimientos/'.$id_seguimiento.'/controles');
	}
	
	public function deleteControles(Request $request,$lang, $id_metodo_control)
	{
		$id_seguimiento = $request->input('id_seguimiento');
		
		$seguimiento = Seguimiento::find($id_seguimiento);
		
		$seguimiento->metodosControl_seguimientos()->detach($id_metodo_control);
		
		return redirect($lang.'/seguimientos/'.$id_seguimiento.'/controles');
	}
	
	
    public function index()
    {
        $seguimientos=Seguimiento::all();
		return view("seguimientos.index", compact("seguimientos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$especies = Especie::all(['id_especie','nombre_comun']);
		$localizaciones = Localizacion::all(['id_localizacion','coord_utm']);
        return view('seguimientos.create', compact('especies','localizaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$lang = \App::getLocale();
		// --------------Store con Toastr -----------------------
		if($lang == "es"){
			$exito = array(
			'message' => '¡Seguimiento creado con exito!',
			'alert-type' => 'success'
			);
			$error = array(
				'message' => '¡El seguimiento no se puede crear!',
				'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Tracking created successfully!',
			'alert-type' => 'success'
			);
			$error = array(
				'message' => 'Tracking cannot be created!',
				'alert-type' => 'error'
			);
		}
			
		try {
			Seguimiento::create($request->all());
			return redirect($lang.'/seguimientos')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/seguimientos')->with($error);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
    public function edit($lang,$id)
    {
		//$seguimiento = Seguimiento::where('id_seguimiento', $id)->first();
		$seguimiento = Seguimiento::find($id);
		$especies = Especie::all(['id_especie','nombre_comun']);
		$localizaciones = Localizacion::all(['id_localizacion','coord_utm']);
		
        return view('seguimientos.edit', compact("seguimiento","especies","localizaciones"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$lang, $id)
    {
		if($lang == "es"){
			// ------------ Update con Toastr ---------------- 
			$exito = array(
			'message' => 'Seguimiento modificado con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'El seguimiento no se puede modificar!',
			'alert-type' => 'error'
			);
		}else{
			// ------------ Update con Toastr ---------------- 
			$exito = array(
			'message' => 'Tracking modified successfully!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The tracking cannot be modified!',
			'alert-type' => 'error'
			);
		}
		
		try {
			$seguimiento = $request->all();
			Seguimiento::find($id)->update($seguimiento);
			return redirect($lang.'/seguimientos')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/seguimientos')->with($error);
		}
		/*
		try {
			Seguimiento::update($request->all());
			//$seguimiento->delete();
			return redirect('seguimientos')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect('seguimientos')->with($error);
		}*/
		
    }
	
	/**
     * Actualizaciรณn de un campo via AJAX.
     *
     * @param  \App\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
		public function actualizarCampo(Request $request){
		
		$id=$request->input("id");										// es == Input::get('id', null);  ? valor nulo si no hay valor
		$campo=$request->input("campo");
		$valor=$request->input("valor");

		if ($id!=null && $campo!=null){	
			Seguimiento::find($id)->update([$campo => $valor]);
		}
		
	}
	
	
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seguimiento  $seguimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy($lang,$id_seguimiento)
    {
		
		if($lang == "es"){
			$exito = array(
			'message' => 'Seguimiento '.$id_seguimiento.' eliminado con exito!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'El seguimiento '.$id_seguimiento.' no es eliminable por sus vinculos en otras tablas!',
			'alert-type' => 'error'
			);
		}else{
			$exito = array(
			'message' => 'Tracking  '.$id_seguimiento.' successfully removed!',
			'alert-type' => 'success'
			);
			$error = array(
			'message' => 'The tracking '.$id_seguimiento.' it is not removable by its links in other tables!',
			'alert-type' => 'error'
			);
		}
		
		try {
			Seguimiento::find($id_seguimiento)->delete();
			return redirect($lang.'/seguimientos')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect($lang.'/seguimientos')->with($error);
		}
    }
}
