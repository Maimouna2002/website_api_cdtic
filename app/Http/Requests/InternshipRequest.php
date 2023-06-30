<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InternshipRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'application_id' => 'required|exists:applications,id',
            'report_file' => 'required|string',
            'status' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'application_id.required' => 'Le champ demande de stage est requis.',
            'application_id.exists' => 'La demande de stage sélectionnée est invalide.',
            'report_file.required' => 'Le champ rapport de stage est requis.',
            'status.required' => 'Le champ statut est requis.',
        ];
    }
}
