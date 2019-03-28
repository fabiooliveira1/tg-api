<?php

namespace Api\Models;

class PaymentWay extends BaseModel
{
    
    public $fillable = [
        'FrPg_descrFormaPgto'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }

}