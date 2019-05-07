<?php

namespace App\Http\Controllers\Api\Renegotiation;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\RenegotiationsRepository;
use App\Notifications\SendEmail;
use Illuminate\Support\Facades\Mail;

class RenegotiationController extends BaseController
{
    public $requestName = 'RenegotiationRequest';

    public function getRepository()
    {
        return app(RenegotiationsRepository::class);
    }

    public function create()
    {
        $request = $this->callRequest();

        try {
            $this->getRepository()->create($request);
            return $this->sendMail();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function sendMail()
    {
        $data = ['message' => 'Isso é um teste!'];
        Mail::send(new SendEmail($data));
    }
}
