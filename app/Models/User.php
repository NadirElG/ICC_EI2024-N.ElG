<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', 'username', 'email', 'role', 'status','password',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Relation : Un utilisateur possède un seul Wallet.
     */
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    public function slots()
    {
        return $this->hasMany(Slot::class, 'user_id'); // Spécifie le nom de la colonne `user_id` dans `slots`
    }

    public function deductBalance(int $amount): bool
    {
        if ($this->wallet && $this->wallet->balance >= $amount) {
            $this->wallet->balance -= $amount;
            $this->wallet->save();
            return true;
        }
        return false;
    }
    

}
