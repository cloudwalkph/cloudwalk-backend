<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Cmailer extends Mailable
{
    use Queueable, SerializesModels;
    protected $order;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email')
                    ->with([
                        'fname'     => $this->order['firstName'],
                        'lname'     => $this->order['lastName'],
                        'email'     => $this->order['emailAddress'],
                        'phone'     => $this->order['phone'],
                        'msg'   => $this->order['message'],
                    ])
                    ->from( $this->order['emailAddress'], $this->order['firstName'] )
                    ->subject('Cloudwalk Digital Inquiry');
    }
}
