<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'balance'];

    /**
     * Relation avec l'utilisateur : chaque Wallet appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Déduit un montant du solde du portefeuille.
     * 
     * @param float $amount
     * @return bool
     */
    public function deductBalance(float $amount): bool
    {
        if ($this->balance >= $amount) {
            $this->balance -= $amount;
            $this->save();

            return true;
        }

        return false; // Solde insuffisant
    }
}
