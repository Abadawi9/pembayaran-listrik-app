<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateTagihan extends FormRequest
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
            'pelanggan_id' => 'required|exists:pelangans,id',
            'tahun' => 'required|integer',
            'bulan' => 'required|string|max:255',
            'jml_pemakaian' => 'required|integer',
        ];
    }
    
    public function message()
    {
        return [
            'pelanggan_id.required' => 'Pelanggan tidak boleh kosong',
            'pelanggan_id.exists' => 'Pelanggan tidak ditemukan',
            'tahun.required' => 'Tahun tidak boleh kosong',
            'tahun.integer' => 'Tahun harus berupa angka',
            'bulan.required' => 'Bulan tidak boleh kosong',
            'bulan.string' => 'Bulan harus berupa string',
            'bulan.max' => 'Bulan maksimal 255 karakter',
            'jml_pemakaian.required' => 'Jumlah pemakaian tidak boleh kosong',
            'jml_pemakaian.integer' => 'Jumlah pemakaian harus berupa angka',
        ];
    }
}
