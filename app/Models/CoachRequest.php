<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'specialty',
        'certification',
        'motivation',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }   

}
