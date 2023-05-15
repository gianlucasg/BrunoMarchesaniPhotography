<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMailModal extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre,$correo,$telefono,$motivo,$consulta)
    {
        $this->dataNombre = $nombre;
        $this->dataCorreo = $correo;
        $this->dataTelefono = $telefono;
        $this->dataMotivo = $motivo;
        $this->dataConsulta = $consulta;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('brunomarchesaniphotography@gmail.com')->subject( $this->dataMotivo)->view('mail.mail', ['nombre' => $this->dataNombre,
        'correo' => $this->dataTelefono,'telefono' => $this->dataTelefono,'motivo' => $this->dataMotivo,'consulta' => $this->dataConsulta,])->replyTo($this->dataCorreo, $this->dataNombre);;
    }
}
