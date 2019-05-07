<?php

namespace App\Repositories;

use App\Models\Renegotiation;

// use Carbon\Carbon;

class RenegotiationsRepository extends BaseRepository
{
    public function getModel()
    {
        return app(Renegotiation::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        return $model;
    }
}
