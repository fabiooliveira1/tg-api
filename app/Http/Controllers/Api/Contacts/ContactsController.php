<?php

namespace App\Http\Controllers\Api\Contacts;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\ContactsRepository;

class ContactsController extends BaseController
{
    public $requestName = 'ContactsRequest';

    public function getRepository()
    {
        return app(ContactsRepository::class);
    }
}
