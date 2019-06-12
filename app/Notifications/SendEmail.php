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
    $data = $this->data;
    $address = 'M2_Print@example.com';
    $name = 'M2 Print';

    $subject = 'Renegociação de contas a pagar - ' . $this->data['descBill'];

    return $this->view('mail', compact('data'))
      ->from($address, $name)
      ->to($this->data['to'], $this->data['nameSupplier'])
      ->subject($subject);
  }
}
