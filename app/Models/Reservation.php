<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Attributs assignables
    protected $fillable = [
        'user_id',
        'slot_id',
        'status',
    ];

    /**
     * Relation avec l'utilisateur : chaque réservation appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relation avec le slot : chaque réservation est liée à un slot.
     */
    public function slot()
    {
        return $this->belongsTo(Slot::class);
    }
}
