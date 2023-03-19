<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'time'=>'required|string',
            'organizer'=>'required|string|max:255',
            'date_start'=>'required|date',
            'date_end'=>'required|date',
            'location'=>'required|string',
            'event_images'=>[$this->isMethod('POST') ? 'required' : 'nullable', 'array'],
        ];
    }

    /**
     * Show error message
     * 
     */
    public function messages()
    {
        return [
            'name.required'=>'Nama Event tidak boleh kosong',
            'name.max'=>'Nama Event maksimal 255 karakter',
            'address.required'=>'Alamat Event tidak boleh kosong',
            'description.required'=>'Deskripsi Event tidak boleh kosong',
            'time.required'=>'Waktu Event tidak boleh kosong',
            'organizer.required'=>'Penyelenggara Event tidak boleh kosong',
            'date_start.required'=>'Tanggal Event tidak boleh kosong',
            'date_end.required'=>'Tanggal Event tidak boleh kosong',
            'location.required'=>'Lokasi Event tidak boleh kosong',
            'event_images.required'=>'Gambar tidak boleh kosong',

        ];
    }
}
