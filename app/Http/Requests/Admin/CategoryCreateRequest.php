<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100', // Le nom est requis, une chaîne de caractères, et limité à 100 caractères.
            'description' => 'nullable|string|max:500', // La description est optionnelle (nullable), chaîne de caractères, max 500 caractères.
            'status' => 'required|boolean', // Le statut est requis et doit être un boolean (1 pour actif, 0 pour inactif).
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // L'image est optionnelle, doit être un fichier image valide avec certaines extensions et ne pas dépasser 2 Mo.
        ];
    }

    /**
     * Messages personnalisés pour les erreurs de validation.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Le nom de la catégorie est obligatoire.',
            'name.unique' => 'Ce nom de catégorie est déjà pris.',
            'description.required' => 'La description de la catégorie est obligatoire.',
            'status.required' => 'Le statut de la catégorie est obligatoire.',
            'image.image' => 'Le fichier doit être une image.',
            'image.mimes' => 'Le fichier doit être au format : jpeg, png, jpg, gif.',
            'image.max' => 'L\'image ne peut pas dépasser 2MB.',
        ];
    }
}
