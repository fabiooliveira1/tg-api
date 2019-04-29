<?php

namespace Api\Models;
use App\Models\BaseModel;
class Attachment extends BaseModel
{

    public $fillable = [
        'Anx_idConta',
        'Anx_conteudo'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function bill()
    {
        return $this->hasOne(Bill::class, 'Cta_idConta');
    }

}