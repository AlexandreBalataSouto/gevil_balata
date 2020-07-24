<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MetodoControl extends Model
{
    protected $table = 'metodos_control';
	protected $primaryKey = 'id_metodo_control';
	protected $guarded = ['id_metodo_control'];
	
	public function seguimientos_metodosControl()
	{
    	return $this->belongsToMany('App\Seguimiento');
    }
}
