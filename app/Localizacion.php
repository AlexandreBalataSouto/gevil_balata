<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localizacion extends Model
{
   	protected $table = 'localizaciones';
	protected $primaryKey = 'id_localizacion';
	protected $guarded = ['id_localizacion'];
	
	/*
	public function avistador()
	{
    	return $this->belongsTo('App\Avistador','avistador_id');
    }
	
	*/
	
	public function enclave()
	{
		return $this->belongsTo('App\Enclave','enclave_id');
	}
	
	public function seguimientos()
   	{
    	return $this->hasMany('App\Seguimiento','localizacion_id');
	}
}
