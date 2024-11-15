<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RefundNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $amount;

    public function __construct($user, $amount)
    {
        $this->user = $user;
        $this->amount = $amount;
    }

    public function build()
    {
        return $this->subject('Votre remboursement a été effectué')
                    ->view('mail.refund_notification');
    }
}
