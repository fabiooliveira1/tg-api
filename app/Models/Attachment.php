<?php

namespace Api\Models;

class Attachment extends BaseModel
{
    
    public $fillable = [
        'Anx_idConta',
        'Anx_endereco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function hasRelatedRecords()
    {
        return $this->bill()->count() > 0 || purchaseOrder()->count() > 0;
    }

    public function bill()
    {
        return $this->hasOne(Bill::class, 'Cta_idConta');
    }

    public function purchaseOrder()
    {
        return $this->hasOne(PurchaseOrder::class);
    }

}