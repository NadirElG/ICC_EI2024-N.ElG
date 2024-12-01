<?php

namespace App\Mail;

use App\Models\Slot;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SlotRefundMail extends Mailable
{
    use Queueable, SerializesModels;

    public $slot;

    public function __construct(Slot $slot)
    {
        $this->slot = $slot;
    }

    public function build()
    {
        return $this->subject('Confirmation de remboursement')
            ->view('mail.slot_refund');
    }
}
