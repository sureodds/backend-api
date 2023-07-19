<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'profile_picture' => ['nullable','image', 'mimes:png,jpg,jpeg'],
            'first_name' => ['nullable', 'string', 'required'],
            'last_name' => ['nullable', 'string', 'required'],
            'phone_number' => ['nullable', 'string', 'required'],
            'email' => ['nullable', 'email', 'unique:users,email'],
            'country' => ['nullable', 'string']
        ];
    }
}