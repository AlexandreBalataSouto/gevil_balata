<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
	protected $primaryKey = 'id_foto';
	protected $guarded = ['id_foto'];
	
    public function especie()
	{
    	return $this->belongsTo('App\Especie','especie_id');
    }
}
