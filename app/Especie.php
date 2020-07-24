<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especie extends Model
{
	protected $primaryKey = 'id_especie';
	protected $guarded = ['id_especie'];
	
    public function seguimientos()
   	{
    	return $this->hasMany('App\Seguimiento','especie_id');
	}
	
	public function fotos()
   	{
    	return $this->hasMany('App\Foto','especie_id');
	}
	/*
	public function familia()
	{
		return $this->belongsTo('App\Familia','familia_id');
	}
	*/
}
