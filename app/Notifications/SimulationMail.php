<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SimulationMail extends Mailable
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

    $subject = 'Uma nova simulação foi criada';

    return $this->view('simulation', compact('data'))
      ->from($address, $name)
      ->to($this->data['email'], $this->data['name'])
      ->subject($subject);
  }
}
