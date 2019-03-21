<?php

namespace Api\Models;

class PurchaseOrder extends BaseModel
{

    public $fillable = [
        'Pc_idPedidoCompra'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function hasRelatedRecords()
    {
        return $this->quotations()->count() > 0;
    }

    public function attachment()
    {
        return $this->belongsTo(attachment::class);
    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

}