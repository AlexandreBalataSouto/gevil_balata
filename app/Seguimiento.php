<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
	protected $primaryKey = 'id_seguimiento';
	protected $guarded = ['id_seguimiento'];
	
   	public function localizacion()
	{
		return $this->belongsTo('App\Localizacion','localizacion_id');
    }
	
	public function especie()
	{
		return $this->belongsTo('App\Especie','especie_id');
    }
	
	public function metodosControl_seguimientos()//esta es de muchos a muchos a lo mejor hay que corregir
	{
    	return $this->belongsToMany('App\MetodoControl','seguimiento_controles','seguimiento_id','metodo_control_id');
    }
}