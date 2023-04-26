<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class DatauserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->idrole == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
        'age' => 'nullable|string|min:0|max:3',
        'city' => 'nullable|string|max:120',
        'country' => 'nullable|string|max:60',
        'cp' => 'nullable|string|max:10',
        'gender' => [
            'nullable',
            'string',
            function ($attribute, $value, $fail) {
                if (!in_array($value, ['Masculino', 'Femenino', 'Prefiero no decirlo'])) {
                    $fail($attribute.' no es un valor permitido.');
                }
            },
        ],
        'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
