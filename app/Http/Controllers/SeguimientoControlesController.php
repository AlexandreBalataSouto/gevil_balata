<?php

namespace App\Http\Controllers;

use App\SeguimientoControles;
use App\MetodoControl;
use Illuminate\Http\Request;

class SeguimientoControlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seguimientoControles = SeguimientoControles::all();
		$metodoControl = MetodoControl::all();
		return view("seguimientoControles.index", compact("seguimientoControles","metodoControl")); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$exito = array(
			'message' => 'Control creado con exito!',
			'alert-type' => 'success'
			);
		$error = array(
			'message' => 'El control no se puede crear!',
			'alert-type' => 'error'
			);
		
		try {
			SeguimientoControles::create($request->all());
			return redirect('seguimientoControles')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect('seguimientoControles')->with($error);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SeguimientoControles  $seguimientoControles
     * @return \Illuminate\Http\Response
     */
    public function show(SeguimientoControles $seguimientoControles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SeguimientoControles  $seguimientoControles
     * @return \Illuminate\Http\Response
     */
    public function edit(SeguimientoControles $seguimientoControles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SeguimientoControles  $seguimientoControles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SeguimientoControles $seguimientoControles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SeguimientoControles  $seguimientoControles
     * @return \Illuminate\Http\Response
     */
    public function destroy($seguimientoControles)
    {
		$exito = array(
		'message' => 'Control '.$seguimientoControles->id_seguimiento_control.' eliminado con exito!',
		'alert-type' => 'success'
		);
		$error = array(
		'message' => 'El seguimiento '.$seguimientoControles->id_seguimiento_control.' no es eliminable por sus vinculos en otras tablas!',
		'alert-type' => 'error'
		);
		try {
			//SeguimientoControles::find($id)->delete();
			$seguimientoControles->delete(); // El método find devuelve un único registro pero ya tengo el obj por lo que solo tengo q llamar al método delete desde ese obj
			return redirect('seguimientoControles')->with($exito);
		}
		catch (\Illuminate\Database\QueryException $e){
			return redirect('seguimientoControles')->with($error);
		}
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
			SeguimientoControles::find($id)->update([$campo => $valor]);
		}
		
	}
	
	
}
