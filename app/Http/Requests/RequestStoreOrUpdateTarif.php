<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestStoreOrUpdateTarif extends FormRequest
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
            'daya' => 'required|numeric',
            'tarif' => 'required|numeric',
            'beban' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'daya.required' => 'Daya harus diisi',
            'daya.numeric' => 'Daya harus berupa angka',
            'tarif.required' => 'Tarif harus diisi',
            'tarif.numeric' => 'Tarif harus berupa angka',
            'beban.required' => 'Beban harus diisi',
            'beban.numeric' => 'Beban harus berupa angka',
        ];
    }
}
