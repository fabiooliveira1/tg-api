<?php

namespace App\Models;

use App\Models\BaseModel;

class User extends BaseModel
{

    public $fillable = [
        'User_nivelAcesso',
        'User_matricula',
        'User_senha',
        'User_nome',
        'User_email'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }
}
