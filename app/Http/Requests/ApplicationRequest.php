<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'offer_id' => 'required|exists:offers,id',
            'cv' => 'required|string',
            'motivation_letter' => 'required|string',
            'status' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Le champ utilisateur est requis.',
            'user_id.exists' => 'L\'utilisateur sélectionné est invalide.',
            'offer_id.required' => 'Le champ offre est requis.',
            'offer_id.exists' => 'L\'offre sélectionnée est invalide.',
            'cv.required' => 'Le champ CV est requis.',
            'motivation_letter.required' => 'Le champ lettre de motivation est requis.',
            'status.required' => 'Le champ statut est requis.',
        ];
    }
}
