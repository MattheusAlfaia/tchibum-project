<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class PacoteUsuarios extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {


       $this->pacote = $data['pacote'];
       $this->user = $data['user'];


    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $pacote = $this->pacote;
        $user = $this->user;
        return $this->view('mail.pacoteusuarios',compact('pacote','user'))
                    ->subject('Solicitação de Compra de Pacote');


    }

}
