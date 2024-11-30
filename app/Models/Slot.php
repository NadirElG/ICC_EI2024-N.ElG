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
        'user_id',       // Ajout de l'ID de l'utilisateur pour l'insertion en masse
        'category_id',   // Ajout de la catégorie
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'capacity',
        'location',
        'price',
        'status',
        'image',         // Ajout de l'image
    ];

    /**
     * Relation avec le modèle User (Coach).
     */
    public function coach()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec le modèle Category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function remainingSeats()
    {
        return $this->capacity - $this->reservations()->count();
    }

    

}
