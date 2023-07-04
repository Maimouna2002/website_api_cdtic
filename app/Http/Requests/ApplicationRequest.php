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
            'cv' => 'required|file|max:2048|mimes:pdf,doc,docx',
            'motivation_letter' => 'required|file|max:2048|mimes:pdf,doc,docx',
            'status' => 'string',
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
            'cv.file' => 'Le champ CV doit être un fichier.',
            'cv.max' => 'Le fichier CV ne doit pas dépasser 2 Mo.',
            'cv.mimes' => 'Le fichier CV doit être de type PDF, DOC ou DOCX.',
            'motivation_letter.required' => 'Le champ lettre de motivation est requis.',
            'motivation_letter.file' => 'Le champ lettre de motivation doit être un fichier.',
            'motivation_letter.max' => 'Le fichier lettre de motivation ne doit pas dépasser 2 Mo.',
            'motivation_letter.mimes' => 'Le fichier lettre de motivation doit être de type PDF, DOC ou DOCX.',
        ];
    }
}
