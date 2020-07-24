<?php

namespace App\Http\Controllers;

use App\MetodoControl;
use App\Seguimiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class MetodoControlController extends Controller
{
    
    public function index()
    {
        return view("metodosControl.index");
    }

	function getDataAjax()
    {
     $metodosControl = MetodoControl::all();
	
     return DataTables::of($metodosControl) //Aqui añadimos y editamos la tabla
		 
		 ->setRowId(function($metodosControl){
			 return $metodosControl->id_metodo_control;
		 })
		 
		 ->addColumn("accion", "<button class='button is-danger' id='borrarMetodoControl'><i class='fas fa-trash-alt'></button>")
		 
		 ->rawColumns(["accion"])
		 
		 ->make(true);
    }
	
	public function addAjax(Request $request)
	{
		$lang = \App::getLocale();

		$validator = Validator::make($request->all(), [
			'nombre_metodo_control' => 'required',
			'descripcion'			=> 'min:10|max:50',
			'observacion'			=> 'min:10|max:50',
        ]);
		
		$messages = $validator->messages();

		if ($validator->fails()) {
			
			$notification = array(
				'message' => $messages->first(),
				'type' => 'error'
			);
				
			return $notification;
        }else{
			$metodoControl = $request->all();
			MetodoControl::create($metodoControl);
		}	
	}
	
	public function updateAjax(Request $request)
	{
		$id_metodo_control = $request->input("id_metodo_control");
		$campo = $request->input("campo");
		$texto = $request->input("texto_campo");
		
		if($id_metodo_control != null && $campo != null) //Si tenemos como minimo el id y el campo ha actualizar 
		{
			MetodoControl::find($id_metodo_control)->update([$campo => $texto]);
		}
		
	}
	
	public function deleteAjax(Request $request)
	{
		$id_metodo_control = $request->input("id_metodo_control");
		MetodoControl::find($id_metodo_control)->delete();
	}
   
}
