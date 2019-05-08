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

    $subject = 'Renegociação de contas a pagar - Conta:' . $this->data['numBill'];

    return $this->view('mail')
      ->from($address, $name)
      ->to($this->data['to'], $this->data['nameSupplier'])
      ->subject($subject);
  }
}
