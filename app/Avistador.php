<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avistador extends Model
{
    protected $table = 'avistadores';
	
	public function localizaciones()
	{
    	return $this->hasMany('App\Localizacion','avistador_id');
    }
}
