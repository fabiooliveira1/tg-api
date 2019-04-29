<?php

namespace App\Http\Controllers\Api\Attachment;

use App\Http\Controllers\Api\BaseController;
use App\Repositories\AttachmentsRepository;

class AttachmentsController extends BaseController
{
    public $requestName = 'AttachmentRequest';

    public function getRepository()
    {
        return app(AttachmentsRepository::class);
    }
}
