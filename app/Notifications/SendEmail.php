<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
  use Queueable, SerializesModels;

  public $data;

  public function __construct($data)
  {
    $this->data = $data;
  }

  public function build()
  {
    $address = 'from@example.com';
    $name = 'M2 Print';

    $subject = 'Renegociação de conta a pagar - Conta: {{ Num.Conta }}';

    $to = 'from@example.com';
    $nameForn = 'Variavel Fornecedor';

    return $this->view('mail')
      ->from($address, $name)
      ->to($to, $name)
      ->subject($subject);
  }
}
