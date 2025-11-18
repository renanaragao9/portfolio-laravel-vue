<?php

namespace App\Http\Requests\Campaign;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCampaignRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'start_date' => 'required|date|before:end_date',
            'end_date' => 'required|date|after:start_date',
            'image_path' => 'nullable|string',
            'goal_amount' => 'required|numeric|min:0',
            'status' => 'nullable|string',
            'ong_profile_id' => 'required|exists:ong_profiles,id',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'start_date.required' => 'A data de início é obrigatória.',
            'start_date.before' => 'A data de início deve ser anterior à data de fim.',
            'end_date.required' => 'A data de fim é obrigatória.',
            'end_date.after' => 'A data de fim deve ser posterior à data de início.',
            'goal_amount.required' => 'O valor objetivo é obrigatório.',
            'goal_amount.numeric' => 'O valor objetivo deve ser um número.',
            'goal_amount.min' => 'O valor objetivo deve ser maior ou igual a zero.',
            'ong_profile_id.required' => 'O perfil da ONG é obrigatório.',
            'ong_profile_id.exists' => 'O perfil da ONG informado não existe.',
        ];
    }
}
