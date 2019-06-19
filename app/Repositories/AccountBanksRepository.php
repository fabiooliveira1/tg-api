<?php

namespace App\Repositories;

use App\Models\AccountBank;

class AccountBanksRepository extends BaseRepository
{
    public function getModel()
    {
        return app(AccountBank::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('CtBc_idAgencia')) {
            $model = $model->where('CtBc_idAgencia', $request->get('CtBc_idAgencia'));
        }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('cta_status', $request->get('status_s'));
        // }

        return $model;
    }
}
