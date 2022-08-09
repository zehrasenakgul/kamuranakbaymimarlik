<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data->email, $this->data->name)->view('mail.application')->with(
            [
                'name' => $this->data->name,
                'email' => $this->data->email,
                'phone' => $this->data->phone,
                'city' => $this->data->city,
            ]
        );
    }
}
