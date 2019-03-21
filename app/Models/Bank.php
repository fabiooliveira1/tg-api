<?php

namespace Api\Models;


class Bank extends BaseModel
{

    public $fillable = [
        'Bc_nomeBanco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function deleteRelations()
    {
        $this->agency()->delete();
        $this->accountBank()->delete();

        return true;
    }

    public function hasRelatedRecords()
    {
        return $this->agency()->count() > 0 || accountBank()->count() > 0;
    }

    public function agency()
    {
        return $this->hasOne(Agency::class);
    }

    public function accountBank()
    {
        return $this->hasMany(AccountBank::class);
    }

}