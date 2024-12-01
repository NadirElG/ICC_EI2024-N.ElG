<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $coach;
    public $amount;
    public $bank_account_number;

    public function __construct(User $coach, $amount, $bank_account_number)
    {
        $this->coach = $coach;
        $this->amount = $amount;
        $this->bank_account_number = $bank_account_number;
    }

    public function build()
    {
        return $this->subject('Demande de retrait du coach')
                    ->view('mail.withdrawal_request');
    }
}

