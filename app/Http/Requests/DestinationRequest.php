<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'destinatinName'=>'required|string|min:3|max:255',
            'destinatinTag'=>'required|string|min:3|max:255',
            'destinatinAddress'=>'required|string|min:3|max:255',
            'destinatinImage'=>'required|string|min:3|max:255',
            'destinatinLoc'=>'required|string|min:3|max:255',
            'destinatinDecs'=>'required|string|min:3',
        ];
    }
    public function messages()
    {
        return [
            'destinationName.required' => 'Nama tidak boleh kosong',
            'destinatinTag'=>'Tag tidak boleh kosong',
            'destinatinAddress'=>'Alamat tidak boleh kosong',
            'destinatinImage'=>'Gambar tidak boleh kosong',
            'destinatinLoc'=>'Lokasi tidak boleh kosong',
            'destinatinDecs'=>'Deskripsi tidak boleh kosong',
        ];
    }

}
