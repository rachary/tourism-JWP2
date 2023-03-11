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
            'name'=>'required|string|max:255',
            'address'=>'required|string',
            'description'=>'required|string',
            'location'=>'required|string',
            'destination_region_id'=>'required|exists:destination_regions,id',
            'destination_tags'=>'required|array|min:1',
            'destination_tags.*'=>'exists:destination_tags,id',
            'destination_images'=>'required|array',
            
        ];
    }

    /**
     * Show error message
     * 
     */
    public function messages()
    {
        return [
            'name.required'=>'Nama Destinasi tidak boleh kosong',
            'name.max'=>'Nama Destinasi maksimal 255 karakter',
            'address.required'=>'Alamat Destinasi tidak boleh kosong',
            'description.required'=>'Deskripsi Destinasi tidak boleh kosong',
            'location.required'=>'Lokasi Destinasi tidak boleh kosong',
            'destination_region_id.required'=>'Region tidak boleh kosong',
            'destination_tags.required'=>'Tag tidak boleh kosong',
            'destination_images.required'=>'Gambar tidak boleh kosong',

        ];
    }
}
