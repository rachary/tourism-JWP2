<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'=>'required|email',
            'password'=>'required',
        ];
    }

    /**
     * Show error messages
     * 
     */
    public function messages()
    {
        return [
            'email.required'=>'Email tidak boleh kosong',
            'email.email'=>'Format email Salah ex: email@email.com',
            'password.required'=>'Password tidak boleh kosong',
        ];
    }

    // /**
    //  * Get authorization credentials from the request
    //  * 
    //  */
    // public function getCredentials()
    // {
    //     $email = $this->get('email');

    //     if ($this->isEmail($email)) {
    //         return [
    //             'email' => $email,
    //             'password' => $this->get('password')
    //         ];
    //     }

    //     return $this->only('username', 'password');
    // }
}
