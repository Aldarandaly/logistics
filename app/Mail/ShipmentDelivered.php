<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ShipmentDelivered extends Mailable
{
    use Queueable, SerializesModels;

    public $customer;
    public $shipment;

    public function __construct($customer, $shipment)
    {
        $this->customer = $customer;
        $this->shipment = $shipment;
    }

    public function build()
    {
        return $this->subject('Your Shipment Has Been Delivered')
            ->view('emails.shipment_delivered')
            ->with([
                'customerName' => $this->customer->name,
                'shipmentDetails' => $this->shipment,
            ]);
    }
}
