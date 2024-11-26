<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'first_name' =>'required',
        'last_name' =>'required',
        'birth_date' =>'required|date',
        'address' =>'required|string',
        'phone' =>'required|string',
        'profile_picture' => 'nullable|image|max:2048',
        'username' =>'required|string|unique:custom_users,username',
        'password' => 'required|string|min:6',
        'email' =>'required|email|unique:custom_users,email',
        'role_id' => 'required|exists:roles,id',
        ];
    }
}
