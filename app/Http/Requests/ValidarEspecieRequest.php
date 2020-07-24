<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Uppercase;

class ValidarEspecieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
    		'nombre_comun'		=> ['required','min:3','max:30',new Uppercase],
			'nombre_cientifico'	=> ['min:3','max:30',new Uppercase],
			'familia'			=> ['min:3','max:30',new Uppercase],
			'descripcion'		=> ['min:3','max:30'],
			
        ];
    }
	
}
