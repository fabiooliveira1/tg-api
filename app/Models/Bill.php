<?php

namespace App\Models;

use App\Models\BaseModel;

class Bill extends BaseModel
{

    protected $table = 'Bills'; 

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
    
    public $dates = ['created_at', 'updated_at', 'Cta_dataEmissao', 'Cta_dataVencimento', 'Cta_dataPagto', 'Cta_dataBaixa'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if($model->Cta_Status == 'Pago')
                throw new \Exception('Não é possível apagar contas já pagas!', 422);
        });
        
    }

    public function deleteRelations()
    {
        $this->attachment()->delete();
        $this->renegotiation()->delete();
        $this->simulation()->delete();

        return true;
    }
    // Rever regras
    // public function hasRelatedRecords()
    // {
    //     return $this->purchaseOrder()->count() > 0 || attachment()->count() > 0 ||
    //     simulation()->count() > 0 || supplier()->count > 0 || renegotiation()->count() > 0;
    // }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function renegotiations()
    {
        return $this->hasMany(Renegotiation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function billGroup()
    {
        return $this->belongsTo(BillGroup::class);
    }

}