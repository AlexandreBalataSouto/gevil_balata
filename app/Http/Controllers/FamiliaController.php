<?php

namespace App\Http\Controllers;

use App\Familia;
use Illuminate\Http\Request;
use DataTables;

class FamiliaController extends Controller
{
    
    public function index()
    {
        return view("familias.index");
    }
	
	function getDataAjax()
    {
     $familias = Familia::all();
	
     return DataTables::of($familias) //Aqui añadimos y editamos la tabla
		 
		 ->setRowId(function($familias){
			 return $familias->id_familia;
		 })
		 
		 ->addColumn("accion", "<button class='button is-danger' id='borrarFamilia'>Eliminar</button>")
		 
		 ->rawColumns(["accion"])
		 
		 ->make(true);
    }
	
	public function addAjax(Request $request)
	{
		$familia = $request->all();
		Familia::create($familia);
	}
	
	public function updateAjax(Request $request)
	{
		$id_familia = $request->input("id_familia");
		$campo = $request->input("campo");
		$texto = $request->input("texto_campo");
		
		if($id_familia != null && $campo != null) //Si tenemos como minimo el id y el campo ha actualizar 
		{
			Familia::find($id_familia)->update([$campo => $texto]);
		}
		
	}
	
	public function deleteAjax(Request $request)
	{
		$id = $request->input("id_familia");
		Familia::find($id)->delete();
	}
  
}
