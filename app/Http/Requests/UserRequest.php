<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
   */
  public function rules():array
  {
    return [
      'name' => 'required|string|max:15|min:4',
      'email' => 'required|string|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/i|max:255',
      'password' => 'nullable|string|min:4',
      'idrole' => 'required',

      'age' => 'nullable|string|min:0|max:3',
      'city' => 'nullable|string|max:120',
      'country' => 'nullable|string|max:60',
      'cp' => 'nullable|string|max:8',
      'gender' => 'nullable|string',
      'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ];
  }
}
