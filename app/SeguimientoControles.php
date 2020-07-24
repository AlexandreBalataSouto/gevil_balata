<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientoControles extends Model
{
	protected $primaryKey = 'id_seguimiento_control';
	protected $guarded = ['id_seguimiento_control'];

   	public function seguimientos()
	{
		return $this->hasMany('App\Seguimiento','seguimiento_id');
    }
	
	public function metodosControl_seguimientos()//esta es de muchos a muchos a lo mejor hay que corregir
	{
    	return $this->hasMany('App\MetodoControl');
    }
}
