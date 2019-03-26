<?php

namespace Api\Models;


class Bank extends BaseModel
{

    public $fillable = [
        'Bc_idBanco',
        'Bc_nomeBanco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        // static::updating(function ($model) {
        //     if($model->Cta_Status == 'Pago')
        //         throw new \Exception('Não é possível apagar contas já pagas!', 422);
        // });

    }

    public function deleteRelations()
    {
        $this->agency()->delete();
        $this->accountBank()->delete();

        return true;
    }

    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

}