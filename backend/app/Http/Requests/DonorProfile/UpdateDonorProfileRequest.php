<?php

namespace App\Http\Requests\DonorProfile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDonorProfileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $donorProfileId = $this->route('donor_profile');

        return [
            'cpf' => 'required|string|unique:donor_profiles,cpf,'.$donorProfileId,
            'phone' => 'required|string',
            'asaas_customer_id' => 'nullable|string|unique:donor_profiles,asaas_customer_id,'.$donorProfileId,
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'cpf.required' => 'O campo CPF é obrigatório.',
            'cpf.unique' => 'Este CPF já está cadastrado.',
            'phone.required' => 'O campo telefone é obrigatório.',
            'user_id.required' => 'O campo usuário é obrigatório.',
            'user_id.exists' => 'O usuário informado não existe.',
        ];
    }
}
