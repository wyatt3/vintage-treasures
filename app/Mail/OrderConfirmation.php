<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $orderID;
    public $shippingAddress;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderID, $shippingAddress)
    {
        $this->orderID = $orderID;
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orderConfirmation')->subject('Vintage Treasures - Order Confirmation');
    }
}
