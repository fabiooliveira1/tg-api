<?php

namespace App\Repositories;

use App\Models\Renegotiation;
use Carbon\Carbon;

class RenegotiationsRepository extends BaseRepository
{
    public function getModel()
    {
        return app(Renegotiation::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        if ($request->filled('Forn_NomeFantasia')) {
            $search = $request->get('Forn_NomeFantasia');
            $model = $model->whereHas('contact', function ($query) use($search) {
                $query = $query->whereHas('supplier', function ($q) use($search) {
                    $q = $q->where('Forn_NomeFantasia', 'like',  '%'.$search.'%');
                });
            });
        }

        if ($request->filled('Forn_CNPJ')) {
            $search = $request->get('Forn_CNPJ');
            $model = $model->whereHas('contact', function ($query) use($search) {
                $query = $query->whereHas('supplier', function ($q) use($search) {
                    $q = $q->where('Forn_CNPJ', 'like',  '%'.$search.'%');
                });
            });
        }

        if ($request->filled('Rng_Status')) {
            $model = $model->where('Rng_Status', $request->get('Rng_Status'));
        }

        if ($request->filled('created_at')) {
            $date = json_decode($request->get('created_at'));
            if($date->from) {
                $model = $model->whereDate('created_at', '>=', new Carbon($date->from));
            }
            if($date->to) {
                $model = $model->whereDate('created_at', '<=', new Carbon($date->to));
            }
        }

        if ($request->filled('updated_at')) {
            $date = json_decode($request->get('updated_at'));
            if($date->from) {
                $model = $model->whereIn('Rng_Status', ['Aprovada', 'Recusada']);
                $model = $model->whereDate('updated_at', '>=', new Carbon($date->from));
            }
            if($date->to) {
                if (!$date->from) {
                    $model = $model->whereIn('Rng_Status', ['Aprovada', 'Recusada']);
                }
                $model = $model->whereDate('updated_at', '<=', new Carbon($date->to));
            }
        }

        return $model;
    }
}
