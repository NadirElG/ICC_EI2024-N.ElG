<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CoachRequest;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CoachRequestController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return view('frontend.dashboard.request_coach_form');
    }

    public function store(Request $request)
    {
        // Valider les champs du formulaire
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'certification' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // ajuster les formats et la taille si besoin
            'motivation' => 'required|string|max:1000',
        ]);

        // Gérer l'upload du fichier de certification
        $certificationPath = $this->uploadFile($request, 'certification');

        // Créer une nouvelle instance de CoachRequest
        $coachRequest = new CoachRequest();

        $coachRequest->user_id = Auth::id(); // Assigner l'ID de l'utilisateur connecté
        $coachRequest->first_name = $request->input('first_name');
        $coachRequest->last_name = $request->input('last_name');
        $coachRequest->specialty = $request->input('specialty');
        $coachRequest->motivation = $request->input('motivation');
        $coachRequest->certification = $certificationPath; // Enregistrer le chemin de la certification
        $coachRequest->status = 'pending'; // Utiliser une valeur définie dans l'énumération

        // Enregistrer la demande de coach dans la base de données
        $coachRequest->save();

        // Rediriger avec un message de succès
        return redirect()->route('user.dashboard')->with('success', 'Votre demande pour devenir coach a été soumise avec succès.');
    }

    protected function uploadFile($request, $fieldName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('certifications', $fileName, 'public');
            
            return $filePath;
        }
        return null;
    }
}
