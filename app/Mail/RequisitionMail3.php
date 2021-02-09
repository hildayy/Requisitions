<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RequisitionMail3 extends Mailable
{
    public $data, $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$url)
    {
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.mail3')
                    ->to('managingdirector@mftfulfillmentcentre.com')
                    ->from('mft.portal@gmail.com', $this->data['name'])
                    ->subject('Requisition');
    }
}
