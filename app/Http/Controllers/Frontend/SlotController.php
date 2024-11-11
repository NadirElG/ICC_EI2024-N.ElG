<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slot;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function index()
    {
        // Récupère les slots actifs avec la capacité disponible
        $slots = Slot::where('status', 'open')->where('capacity', '>', 0)->get();

        return view('frontend.slots.index', compact('slots'));
    }

    public function show($id)
    {
        $slot = Slot::findOrFail($id);
        return view('frontend.slots.slot-details', compact('slot'));
    }

}
