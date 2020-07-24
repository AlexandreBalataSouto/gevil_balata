<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ValidarFormFotosRequest extends FormRequest
{
    public function rules()
    {
        return [
            'imagen'  => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ];
    }
}

?>