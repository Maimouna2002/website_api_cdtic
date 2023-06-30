<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DomainRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Mettez cette valeur à true si vous souhaitez autoriser cette requête par défaut
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le champ "Nom" est requis.',
            'name.string' => 'Le champ "Nom" doit être une chaîne de caractères.',
            'name.max' => 'Le champ "Nom" ne doit pas dépasser :max caractères.',
            'status.required' => 'Le champ "Statut" est requis.',
            'status.in' => 'Le champ "Statut" doit être soit "actif" soit "inactif".',
        ];
    }
}
