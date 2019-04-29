<?php

namespace App\Models;

use App\Models\BaseModel;

class Attachment extends BaseModel
{
    protected $table = 'Attachments';
    protected $primaryKey = 'Anx_idConta';

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
