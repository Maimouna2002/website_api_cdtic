<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TypeOfferRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|unique:type_offers',
            'description' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le champ nom est requis.',
            'name.string' => 'Le champ nom doit être une chaîne de caractères.',
            'name.unique' => 'Le nom du type d\'offre est déjà utilisé.',
            'description.string' => 'Le champ description doit être une chaîne de caractères.',
        ];
    }
}
