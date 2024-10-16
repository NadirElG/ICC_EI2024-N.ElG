<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
}
