<?php

namespace App\Mail;

use App\Models\Slot;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReservationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $slot;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Slot $slot)
    {
        $this->user = $user;
        $this->slot = $slot->load('coach'); // Charger la relation coach
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Confirmation de votre réservation')
                    ->view('mail.reservation_confirmation');
    }
}
