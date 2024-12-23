<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Slot;
use App\Models\Category;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SlotController extends Controller
{
    use FileUploadTrait;

    /**
     * Affiche la liste des slots du coach.
     */
    public function index()
    {
        $slots = Auth::user()->slots;
        return view('coach.dashboard.slots.index', compact('slots'));
    }

    /**
     * Affiche le formulaire de création d'un nouveau slot.
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('coach.dashboard.slots.create', compact('categories'));
    }

    /**
     * Enregistre un nouveau slot dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'capacity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'status' => 'required|in:open,in_progress,completed',
            'image' => 'required|image|max:3000',
        ]);

        // Vérification et déduction du solde dans le wallet
        $user = Auth::user();
        if (!$user->deductBalance(10)) {
            return redirect()->route('coach.slots.index')->with('error', 'Insufficient credits. You need at least 10 credits to create a slot.');
        }

        // Utilisation du trait pour stocker l'image dans public/images/slots
        $imagePath = $this->uploadImage($request, 'image', 'slots');

        // Création du slot
        $slot = new Slot([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
            'start_time' => $request->input('start_time'),
            'end_time' => $request->input('end_time'),
            'capacity' => $request->input('capacity'),
            'location' => $request->input('location'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'category_id' => $request->input('category_id'),
            'image' => $imagePath,
            'user_id' => $user->id,
        ]);

        $slot->save();

        return redirect()->route('coach.slots.index')->with('success', 'Slot created successfully, and 10 credits were deducted.');
    }

    /**
     * Affiche le formulaire d'édition d'un slot existant.
     */
    public function edit(Slot $slot)
    {
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('slots.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce slot.');
        }

        $categories = Category::where('status', 1)->get();
        return view('coach.dashboard.slots.edit', compact('slot', 'categories'));
    }

    /**
     * Met à jour un slot dans la base de données.
     */
    public function update(Request $request, Slot $slot)
    {
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('slots.index')->with('error', 'Vous n\'êtes pas autorisé à modifier ce slot.');
        }

        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'date' => ['required', 'date', 'after_or_equal:today'],
            'start_time' => ['required', 'date_format:H:i'],
            'end_time' => ['required', 'date_format:H:i', 'after:start_time'],
            'capacity' => ['required', 'integer', 'min:1'],
            'location' => ['nullable', 'string', 'max:255'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'category_id' => ['required', 'exists:categories,id'],
            'status' => ['required', 'in:open,in_progress,completed'],
        ]);

        // Utilisation du trait pour mettre à jour l'image
        $imagePath = $this->updateImage($request, 'image', 'slots', $slot->image);

        $slot->title = $request->title;
        $slot->description = $request->description;
        $slot->date = $request->date;
        $slot->start_time = $request->start_time;
        $slot->end_time = $request->end_time;
        $slot->capacity = $request->capacity;
        $slot->location = $request->location;
        $slot->price = $request->price;
        $slot->category_id = $request->category_id;
        $slot->status = $request->status;
        $slot->image = $imagePath ?? $slot->image;

        $slot->save();

        return redirect()->route('slots.index')->with('success', 'Slot updated successfully.');
    }

    /**
     * Supprime un slot de la base de données.
     */
    public function destroy(Slot $slot)
    {
        if ($slot->coach_id !== Auth::id()) {
            return redirect()->route('coach.slots.index')->with('error', 'Vous n\'êtes pas autorisé à supprimer ce slot.');
        }

        $this->removeImage($slot->image);
        $slot->delete();

        return redirect()->route('coach.slots.index')->with('success', 'Slot deleted successfully.');
    }

}
