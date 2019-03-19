<?php

namespace Api\Models;

class Bill extends BaseModel
{

    public $fillable = [
        'Cta_idUser',
        'Cta_idGrupo',
        'Cta_idFornecedor',
        'Cta_descrConta',
        'Cta_dataInclusao',
        'Cta_dataEmissao',
        'Cta_dataVencimento',
        'Cta_dataPagto',
        'Cta_dataBaixa',
        'Cta_codBarra',
        'Cta_valConta',
        'Cta_totalConta',
        'Cta_tempoProtesto',
        'Cta_valProtesto',
        'Cta_Multa',
        'Cta_Juros',
        'Cta_Status',
        'Cta_idPedidoCompra'
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

    public function purchaseOrders()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

}