<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    public $detail;
    public $bill;

    public function __construct($detail,$bill)
    {
        $this->detail = $detail;
        $this->bill = $bill;
    }
    public function build()
    {
        return $this->markdown('email.order_email');
    }
}
