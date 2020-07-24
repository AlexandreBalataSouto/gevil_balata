<?php

namespace App\Http\Controllers;

use App\Localizacion;
use App\Enclave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class LocalizacionController extends Controller
{
 
    public function index()
    {
		$enclaves = Enclave::all();
        return view("localizaciones.index", compact('enclaves'));
    }
	
	function getDataAjax()
    {
     	$localizaciones = Localizacion::all();
		
		
		
     	return DataTables::of($localizaciones) //Aqui añadimos y editamos la tabla
		 
		 ->setRowId(function($localizaciones){
			 return $localizaciones->id_localizacion;
		 })
		 
		->addColumn("accion", "<button class='button is-danger' id='borrarLocalizacion'><i class='fas fa-trash-alt'></button>")
			
		->addColumn("confirmada", function($localizaciones){
			
			if($localizaciones->confirmada == 1){
				return "<input type='checkbox' data-campo='confirmada' class='confirmarTable' checked>";
			}else{
				return "<input type='checkbox' data-campo='confirmada' class='confirmarTable'>";
			}
		})
			
		->addColumn("enclaves",function(Localizacion $localizacion){
			
			$html;
			$enclaves = $localizacion->enclave->all();
			
			$html = "<div class='select'><select class='enclaveTableList'>".
			"<option disabled selected value='{$localizacion->enclave_id}'>{$localizacion->enclave->nombre_enclave}</option>";
			
			foreach($enclaves as $enclave){
				
				$html .= "<option value='{$enclave->id_enclave}'>{$enclave->nombre_enclave}</option>";
					
			}
			
			$html .= "</select></div>";
			
			return $html;
 
		})
		 
		->editColumn("fecha_alta", function($localizaciones){
			
			return "<div class='control'><input id='fecha_altaTable' data-campo='fecha_alta' class='input' type='date' value='{$localizaciones->fecha_alta}'></div>";
			
		})
		
		->rawColumns(["accion","confirmada","enclaves","fecha_alta"])
		 
		 
		
		 ->make(true);
    }
	
	public function addAjax(Request $request)
	{
		$lang = \App::getLocale();

		$validator = Validator::make($request->all(), [
			'coord_utm'		=> 'required',
			'observacion'	=> 'min:10|max:50',
        ]);
		
		$messages = $validator->messages();

		if ($validator->fails()) {
			
			$notification = array(
				'message' => $messages->first(),
				'type' => 'error'
			);

			return $notification;
        }else{
			$localizacion = $request->all();
			Localizacion::create($localizacion);
		}
	}
	
	public function updateAjax(Request $request)
	{
		$id_localizacion = $request->input("id_localizacion");
		$campo = $request->input("campo");
		$texto = $request->input("texto_campo");
		
		if($id_localizacion != null && $campo != null) //Si tenemos como minimo el id y el campo ha actualizar 
		{
			Localizacion::find($id_localizacion)->update([$campo => $texto]);
		}
		
	}
	
	public function deleteAjax(Request $request)
	{
		$id = $request->input("id_localizacion");
		Localizacion::find($id)->delete();
	}

}
