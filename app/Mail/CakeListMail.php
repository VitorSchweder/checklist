<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CakeListMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $cake;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cake)
    {
        $this->cake = $cake;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('O bolo que você se interessou está disponível')
            ->from('checklistfacil@teste.com.br', 'Checklist Fácil')
            ->view('email.cake-available', [                
                'cakeName' => $this->cake->name,
                'availableQuantity' => $this->cake->available_quantity
            ]);
    }
}
