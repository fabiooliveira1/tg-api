<?php

namespace Api\Models;

class Bill extends BaseModel
{

    public $fillable = [
        'Cta_idUser',
        'Cta_idGrupo',
        'Cta_idFornecedor',
        'Cta_descrConta',
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
    
    public $dates = ['created_at', 'updated_at', 'Cta_dataInclusao', 'Cta_dataEmissao', 'Cta_dataVencimento', 'Cta_dataPagto', 'Cta_dataBaixa'];

    public static function boot()
    {
        parent::boot();
        
    }

    public function deleteRelations()
    {
        $this->attachment()->delete();
        $this->renegotiation()->delete();
        $this->simulation()->delete();

        return true;
    }

    public function hasRelatedRecords()
    {
        return $this->purchaseOrder()->count() > 0 || attachment()->count() > 0 ||
        simulation()->count() > 0 || supplier()->count > 0 || renegotiation()->count() > 0;
    }

    public function purchaseOrder()
    {
        return $this->hasMany(PurchaseOrder::class);
    }

    public function attachment()
    {
        return $this->hasMany(Attachment::class);
    }

    public function renegotiation()
    {
        return $this->hasOne(Renegotiation::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function supplier()
    {
        return $this->hasOne(Supplier::class);
    }

    public function billGroup()
    {
        return $this->hasOne(BillGroup::class);
    }

}