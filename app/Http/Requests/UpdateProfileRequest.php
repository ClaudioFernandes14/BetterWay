<?php

namespace App\Http\Requests;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Http\FormRequest;


class UpdateProfileRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'name' => 'string|max:255',
            //'email' => 'email|max:255|unique:users,email,' . $this->user()->id,
            //'password' => 'nullable|string|min:8|confirmed',
            //'morada' => 'nullable|string|max:255',
            //'cod_postal' => 'nullable|string|max:255',
            //'telemovel' => 'nullable|string|max:255',
            //'nif' => 'required|string|max:255',
        ];
    }
}
?>