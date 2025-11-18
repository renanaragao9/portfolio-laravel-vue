<?php

namespace App\Http\Requests\Donation;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'amount' => 'required|numeric|min:0',
            'status' => 'nullable|string',
            'asaas_payment_id' => 'nullable|string',
            'asaas_pix_qr' => 'nullable|string',
            'asaas_pix_code' => 'nullable|string',
            'transaction_date' => 'nullable|date',
            'payment_date' => 'nullable|date',
            'compaign_id' => 'required|exists:campaigns,id',
            'user_id' => 'required|exists:users,id',
        ];
    }

    public function messages(): array
    {
        return [
            'amount.required' => 'O valor da doação é obrigatório.',
            'amount.numeric' => 'O valor da doação deve ser um número.',
            'amount.min' => 'O valor da doação deve ser maior ou igual a zero.',
            'transaction_date.date' => 'A data da transação deve ser uma data válida.',
            'payment_date.date' => 'A data do pagamento deve ser uma data válida.',
            'compaign_id.required' => 'A campanha é obrigatória.',
            'compaign_id.exists' => 'A campanha informada não existe.',
            'user_id.required' => 'O usuário é obrigatório.',
            'user_id.exists' => 'O usuário informado não existe.',
        ];
    }
}
