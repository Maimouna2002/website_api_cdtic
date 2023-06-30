<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
          'type_offer_id' => ['required', 'exists:type_offers,id'],
          'domain_id' => ['required', 'exists:domains,id'],
          'description' => ['required', 'string'],
          'date_start' => ['required', 'date'],
          'date_end' => ['required', 'date', 'after_or_equal:date_start'],
          'available_places' => ['required', 'integer', 'min:1'],
          'status' => ['required', 'string', 'in:pending,active,closed'], // Assurez-vous de spécifier les valeurs valides pour le statut
        ];
    }

    public function messages()
    {
      return [
        'type_offer_id.required' => 'Le champ "Type d\'offre" est requis.',
        'type_offer_id.exists' => 'Le "Type d\'offre" sélectionné est invalide.',
        'description.required' => 'Le champ "Description" est requis.',
        'date_start.required' => 'Le champ "Date de début" est requis.',
        'date_start.date' => 'Le champ "Date de début" doit être une date valide.',
        'date_end.required' => 'Le champ "Date de fin" est requis.',
        'date_end.date' => 'Le champ "Date de fin" doit être une date valide.',
        'date_end.after_or_equal' => 'La "Date de fin" doit être postérieure ou égale à la "Date de début".',
        'available_places.required' => 'Le champ "Places disponibles" est requis.',
        'available_places.integer' => 'Le champ "Places disponibles" doit être un nombre entier.',
        'available_places.min' => 'Le champ "Places disponibles" doit être d\'au moins :min.',
        'status.required' => 'Le champ "Statut" est requis.',
        'status.string' => 'Le champ "Statut" doit être une chaîne de caractères.',
        'status.in' => 'Le "Statut" sélectionné est invalide.',
    ];
}
}


