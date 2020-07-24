<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Familia extends Model
{
	protected $primaryKey = 'id_familia';
	protected $guarded = ['id_familia'];
	/*
    public function especies()
   	{
    	return $this->hasMany('App\Especie','familia_id');
	}*/
}
