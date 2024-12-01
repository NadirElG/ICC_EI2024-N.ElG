<?php

namespace App\Mail;

use App\Models\Slot;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SlotCanceledMail extends Mailable
{
    use Queueable, SerializesModels;

    public $slot;
    public $reason;
    public $message;

    public function __construct(Slot $slot, $reason, $message = null)
    {
        // Transformer le slot en tableau avec les informations nécessaires
        $this->slot = [
            'title' => $slot->title,
            'date' => \Carbon\Carbon::parse($slot->date)->format('d/m/Y'),
            'start_time' => \Carbon\Carbon::parse($slot->start_time)->format('H:i'),
            'end_time' => \Carbon\Carbon::parse($slot->end_time)->format('H:i'),
        ];
        $this->reason = $reason;
        $this->message = $message;
    }

    public function build()
    {
        return $this->subject('Annulation de votre réservation')
            ->view('mail.slot_canceled');
    }
}
