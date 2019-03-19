<?php

namespace Api\Models;

class Renegotiation extends BaseModel
{
    

    public $fillable = [
        'Rng_idConta',
        'Rng_valProposta',
        'Rng_vencProposta',
        'Rng_descrProposta',
        'Rng_Iniciativa',
        'Rng_Status'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function bills()
    {
        return $this->hasOne(Bill::class);
    }

   
}