<?php
namespace App\Helpers;

use Stichoza\GoogleTranslate\GoogleTranslate;
use Exception;

class TranslationHelper
{
    public static function translate($text, $targetLang = null)
    {
        // Récupérer la langue cible dans la session ou définir le français par défaut
        $targetLang = $targetLang ?? session('locale', 'fr');
        
        // Vérifier si la langue cible est valide (optionnel)
        $validLanguages = ['en', 'fr', 'es', 'de', 'nl']; // Ajoutez d'autres langues valides ici
        if (!in_array($targetLang, $validLanguages)) {
            throw new Exception("La langue cible '$targetLang' n'est pas valide.");
        }

        try {
            // Instancier GoogleTranslate avec la langue cible
            $tr = new GoogleTranslate();
            $tr->setSource('fr'); // Définir le français comme langue source
            $tr->setTarget($targetLang);

            // Retourner la traduction
            return $tr->translate($text);
        } catch (Exception $e) {
            // Gérer les exceptions (par exemple, journaliser l'erreur)
            // Vous pouvez également retourner un message d'erreur ou une valeur par défaut
            return "Erreur de traduction : " . $e->getMessage();
        }
    }
}