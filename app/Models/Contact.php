<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'contact'
    ];

    protected $casts = [
        'contact' => 'string', // Certifique-se de que o campo é convertido para uma string
    ];

    // Definindo as regras de validação
    public static function rules()
    {
        return [
            'name' => 'required|string|min:6',
            'contact' => 'required|string|digits:9|unique:contacts,contact', // Aqui adicionamos a regra de 9 dígitos
            'email' => 'required|email|unique:contacts,email',
        ];
    }
}
