<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersRepository extends BaseRepository
{
    public function getModel()
    {
        return app(User::class);
    }

    public function filter($request)
    {
        $model = $this->getModel();

        // if ($request->filled('status')) {
        //     $model->whereCtaStatus($request->get('status'));
        // }

        // if ($request->filled('status_s')) {
        //     $model->whereIn('cta_status', $request->get('status_s'));
        // }

        return $model;
    }

    public function create($request)
    {
        $model = $this->getModel();
        $array = is_array($request) ? $request : $request->all();
        $array['User_senha'] = Hash::make($array['User_senha']);
        $model = $model->create($array);
        return $model;
    }

    public function update($id, $request)
    {
        $model = $this->findById($id);
        $array = is_array($request) ? $request : $request->all();
        $model->User_matricula = $array['User_matricula'];
        $model->User_email = $array['User_email'];
        $model->User_nome = $array['User_nome'];
        $model->User_nivelAcesso = $array['User_nivelAcesso'];
        if (isset($array['User_senha'])) {
            $model->User_senha = Hash::make($array['User_senha']);
        }
        $model->save();
        return $model;
    }
}
