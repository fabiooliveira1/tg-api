<?php

namespace App\Models;

use App\Models\BaseModel;

class Attachment extends BaseModel
{
    protected $table = 'Attachments';
    protected $primaryKey = 'Anx_idAnexo';

    public $fillable = [
        'Anx_idConta',
        'Anx_endereco',
        'Anx_nome',
        'Anx_formato',
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
