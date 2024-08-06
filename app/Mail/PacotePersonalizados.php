<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class PacotePersonalizados extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {

       $this->pacotepersonalizado = $data['pacote'];
       $this->user = $data['user'];



    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        $pacotepersonalizado = $this->pacotepersonalizado;

        $user = $this->user;

        return $this->view('mail.pacotepersonalizados',compact('pacotepersonalizado','user'))
                    ->subject('Solicitação de Compra de Pacote');


    }

}
