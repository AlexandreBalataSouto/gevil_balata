<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Uppercase implements Rule
{
   
    public function __construct()
    {
        //
    }

    
    public function passes($attribute, $value)
    {
        return ucfirst($value) === $value;
    }

    public function message()
    {
        return ':attribute debe tener la primera letra en mayuscula';
    }
}
