<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'content' => 'required',
            'price' => 'required|numeric',
            'owner' => 'required',
            'owner_contact' => 'required|numeric',
            // 'owner_wacontact' => 'numeric',
            'lat' => 'required',
            'long' => 'required',
            'attachments' => 'required|array|min:1',
            'attachments.*' => 'required'
        ];
    }

    public function attributes()
    {
        return [

            'title' => 'Judul',
            'content' => 'Deskripsi',
            'price' => 'Harga',
            'owner' => 'Pelapak',
            'owner_contact' => 'Nomor telepon pelapak',
            'owner_wacontact' => 'Nomor WA pelapak',
            'attachments' => 'Berkas',
            'attachments' => 'Berkas',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute Wajib dimasukan',
            'numeric' => ':attribute harus berupa angka'
        ];
    }
}
