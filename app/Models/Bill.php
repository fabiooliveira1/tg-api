<?php

namespace App\Models;

use App\Models\BaseModel;

class Bill extends BaseModel
{

    protected $table = 'Bills';
    protected $primaryKey = 'Cta_idConta';

    public $fillable = [
        'Cta_idUser',
        'Cta_idGrupo',
        'Cta_idFornecedor',
        'Cta_descrConta',
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
        'Cta_Status'
    ];

    public $dates = ['created_at', 'updated_at', 'Cta_dataEmissao', 'Cta_dataVencimento', 'Cta_dataPagto', 'Cta_dataBaixa'];

    

    // Rever regras
    // public function hasRelatedRecords()
    // {
    //     return $this->purchaseOrder()->count() > 0 || attachment()->count() > 0 ||
    //     simulation()->count() > 0 || supplier()->count > 0 || renegotiation()->count() > 0;
    // }

    public function users()
    {
        return $this->belongsTo(User::class, 'Cta_idUser', 'Cta_idConta');
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class, 'Cta_idFornecedor', 'Cta_idConta');
    }

    public function billGroups()
    {
        return $this->belongsTo(BillGroup::class, 'Cta_idGrupo', 'Cta_idConta');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'Anx_idConta', 'Cta_idConta');
    }

    public function renegotiations()
    {
        return $this->hasMany(Renegotiation::class, 'Rng_idConta', 'Cta_idConta');
    }

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if ($model->Cta_Status == 'P'){
                throw new \Exception('Não é possível apagar contas já pagas!', 422);
            }
            else{
                static::deleting(function($bill) { // before delete() method call this
                    $bill->attachments()->delete();
                    $bill->renegotiations()->delete();
                    // do the rest of the cleanup...
               });
            }
        });
    }
    
}
