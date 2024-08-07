<?php
namespace App\Http\Controllers\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketEmailMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $ticketData;

    public function __construct(array $ticketData)
    {
        $this->ticketData = $ticketData;
    }

    public function build()
    {
        return $this->subject('Your Ticket Has Been Replied')
                    ->markdown('emails.ticket', [
                        'ticketData' => $this->ticketData,
                        'subcopy' => 'We have replied to your ticket. Please login to your account to view the reply.',
                    ]);
    }
}
