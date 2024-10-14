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
            'name' => 'required|string|max:100|unique:categories,name', // Le nom est obligatoire, doit être unique et ne pas dépasser 100 caractères.
            'description' => 'required|string|max:255', // La description est obligatoire et ne doit pas dépasser 255 caractères.
            'status' => 'required|boolean', // Le statut doit être un booléen (1 ou 0).
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // L'image est optionnelle, doit être un fichier image et la taille maximale est de 2MB.
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
