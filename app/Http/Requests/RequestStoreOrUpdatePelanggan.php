<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdatePelanggan extends FormRequest
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
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'no_telp' => 'required|numeric',
            'no_meter' => 'required|numeric',
            'tarif_id' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berupa string',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berupa string',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter',
            'no_telp.required' => 'No. Telp harus diisi',
            'no_telp.numeric' => 'No. Telp harus berupa angka',
            'no_meter.required' => 'No. Meter harus diisi',
            'no_meter.numeric' => 'No. Meter harus berupa angka',
            'tarif_id.required' => 'Tarif harus diisi',
            'tarif_id.numeric' => 'Tarif harus berupa angka',
        ];
    }
}
