<?php

namespace App\Models;

use App\Models\BaseModel;

class Renegotiation extends BaseModel
{
    protected $table = 'Renegotiations';
    protected $primaryKey = 'Rng_idProposta';

    public $fillable = [
        // 'Rng_idProposta',
        'Rng_idConta',
        'Rng_valProposta',
        'Rng_vencProposta',
        'Rng_valAntigo',
        'Rng_vencAntigo',
        'Rng_descrProposta',
        'Rng_Iniciativa',
        'Rng_Status'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if ($model->Rng_Status == 'Aprovado')
                throw new \Exception('Não é possível apagar renegociações aprovadas!', 422);
        });
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class, 'Cta_idConta');
    }
}
