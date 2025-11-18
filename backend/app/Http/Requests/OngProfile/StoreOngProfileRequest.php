<?php

namespace App\Http\Requests\OngProfile;

use Illuminate\Foundation\Http\FormRequest;

class StoreOngProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'cnpj' => 'required|string|unique:ong_profiles,cnpj',
            'image_path' => 'nullable|string',
            'website_url' => 'nullable|url',
            'asaas_customer_id' => 'nullable|string|unique:ong_profiles,asaas_customer_id',
            'user_id' => 'required|exists:users,id|unique:ong_profiles,user_id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'cnpj.required' => 'O campo CNPJ é obrigatório.',
            'cnpj.unique' => 'Este CNPJ já está cadastrado.',
            'website_url.url' => 'O campo website deve ser uma URL válida.',
            'user_id.required' => 'O campo usuário é obrigatório.',
            'user_id.exists' => 'O usuário informado não existe.',
            'user_id.unique' => 'Este usuário já possui um perfil de ONG.',
        ];
    }
}
