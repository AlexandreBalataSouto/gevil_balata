<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enclave extends Model
{
	protected $primaryKey = 'id_enclave';
	protected $guarded = ['id_enclave'];
	
	
	public function localizaciones()
	{
		return $this->hasMany('App\Localizacion','enclave_id');
	}
	
}
