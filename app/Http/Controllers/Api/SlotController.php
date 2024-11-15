<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    // Lister tous les slots
    public function index()
    {
        $slots = Slot::with('category')->get();
        return response()->json($slots);
    }

    // Obtenir les détails d’un slot
    public function show($id)
    {
        $slot = Slot::with('category')->find($id);

        if (!$slot) {
            return response()->json(['error' => 'Slot not found'], 404);
        }

        return response()->json($slot);
    }

    // Modifier le statut d’un slot (par le propriétaire uniquement)
    public function update(Request $request, $id)
    {
        $slot = Slot::find($id);

        if (!$slot) {
            return response()->json(['error' => 'Slot not found'], 404);
        }

        // Vérifier si l'utilisateur est le propriétaire
        if (auth()->id() !== $slot->user_id) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Validation uniquement pour le champ "status"
        $validated = $request->validate([
            'status' => 'required|in:active,inactive',
        ]);

        $slot->update($validated);

        return response()->json([
            'message' => 'Slot status updated successfully',
            'slot' => $slot,
        ]);
    }
}