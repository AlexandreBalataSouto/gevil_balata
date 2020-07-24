<?php

namespace App\Http\Controllers;

use App\Enclave;
use App\Localizacion;
use App\Especie;
use App\MetodoControl;
use Illuminate\Http\Request;
use App;
use PDF;
use View;

class PDFController extends Controller
{
     public function createPDF($lang,$informe){
		 
		switch($informe){
			case "enclaves":
				$datos = Enclave::select('nombre_enclave','municipio','observacion')->get()->toArray();
			break;
			case "localizaciones":
				$datos = Localizacion::select('coord_utm as coordenadas','fecha_alta','altura','confirmada','observacion','enclave_id as enclave')->get()->toArray();
			break;
			case "especies":
				$datos = Especie::select('nombre_comun','nombre_cientifico','estatus_legal','riesgo','ini_periodo_trabajo','fin_periodo_trabajo')->get()->toArray();
			break;
			case "metodos_control":
				$datos = MetodoControl::select('nombre_metodo_control','descripcion','observacion')->get()->toArray();
			break;
		} 
		 
		$vista=View::make('pdfs.informesPDF',compact('datos'))->render();
        $pdf = App::make('dompdf.wrapper'); 
		$pdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $pdf->loadHTML($vista); 
        return $pdf->stream(); 
        //return $pdf->download($informe.'.pdf'); //descargar pdf
	}
	
}
