<?php

namespace App\Http\Controllers;

use App\Enclave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class EnclaveController extends Controller
{
   
    public function index()
    {
        return view('enclaves.index');
    }

	function getDataAjax()
    {
     $enclaves = Enclave::all();
	
     return DataTables::of($enclaves) //Aqui añadimos y editamos la tabla
		 
		 ->setRowId(function($enclaves){
			 return $enclaves->id_enclave;
		 })
		 
		->addColumn("accion", "<button class='button is-danger' id='borrarEnclave'><i class='fas fa-trash-alt'></i></button>")
		 
		->editColumn("municipio", function($enclaves){
			return "<div class='select'><select class='municipioTableList'>".
					"<option disabled selected>{$enclaves->municipio}</option>".
					"<option value='Arrecife'>Arrecife</option>".
					"<option value='Haria'>Haria</option>".
					"<option value='San Bartolome'>San Bartolome</option>".
					"<option value='Teguise'>Teguise</option>".
					"<option value='Tias'>Tias</option>".
					"<option value='Tinajo'>Tinajo</option>".
					"<option value='Yaiza'>Yaiza</option></select></div>";
		})
		 
		 ->rawColumns(["accion","municipio"])
		 
		 ->make(true);
    }
	
	public function addAjax(Request $request)
	{
		
		$validator = Validator::make($request->all(), [
            'nombre_enclave'	=> 'required',
			'observacion'		=>	'min:10|max:50',
        ]);
		
		$messages = $validator->messages();
		
		if ($validator->fails()) {
			
			$notification = array(
				'message' => $messages->first(),
				'type' => 'error'
			);
			return $notification;
        }else{
			$enclave = $request->all();
		
			Enclave::create($enclave);
		}
		
		
	}
	
	public function updateAjax(Request $request)
	{
		$id_enclave = $request->input("id_enclave");
		$campo = $request->input("campo");
		$texto = $request->input("texto_campo");
		
		
		if($id_enclave != null && $campo != null) //Si tenemos como minimo el id y el campo ha actualizar 
		{
			Enclave::find($id_enclave)->update([$campo => $texto]);
		}
		
	}
	
	public function deleteAjax(Request $request)
	{
		$id = $request->input("id_enclave");
		
		$lang = \App::getLocale();
		
		if(count(Enclave::find($id)->localizaciones)==0){
			Enclave::find($id)->delete();
		}else{
			if($lang == "es"){
				$notification = array(
					'message' => 'Este enclave no se puede borrar',
					'type' => 'error'
				);
			}else{
				$notification = array(
					'message' => 'This enclave cannot be deleted',
					'type' => 'error'
				);
			}
			return $notification;
		}
		
		
	}
}
