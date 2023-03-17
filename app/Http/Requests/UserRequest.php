<?php

namespace App\Http\Requests;

use App\Models\UserRole;
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
    public function rules(): array
    {
        return [
            'name'=>'required|string|min:3|max:255',
            'email'=>'required|string|unique:users|email|max:255',
            'password'=>'required|string|min:4|max:255',
            'phone'=>'required|numeric|string',
            'role'=>'required|in:'.join(',', [UserRole::ADMINISTRATOR, UserRole::CONTRIBUTOR]),
        ];
    }

     /**
     * Show error message
     * 
     */
    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Nama minimal 3 karakter',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Nama tidak boleh kosong',
            'password.min' => 'Password minimal 4 karakter',
            'password.max' => 'Password maksimal 255 karakter',
            'phone.required' => 'Nomor hp harus diisi',
            'phone.numeric' => 'Nomor hp harus memakai numerik',
        ];
    }
}
