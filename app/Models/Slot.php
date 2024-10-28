<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables en masse.
     *
     * @var array
     */
    protected $fillable = [
        'coach_id',
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'capacity',
        'location',
        'price',
        'status',
    ];

    /**
     * Relation avec le modèle User (Coach).
     */
    public function coach()
    {
        return $this->belongsTo(User::class, 'coach_id');
    }
}
