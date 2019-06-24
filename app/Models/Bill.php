<?php

namespace App\Models;

use App\Models\BaseModel;

class Bill extends BaseModel
{

    protected $table = 'Bills';
    protected $primaryKey = 'Cta_idConta';

    public $fillable = [
        'Cta_numConta',
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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->Cta_Status = 'Aberta';
        });
        // static::updating(function ($model) {
        //     if ($model->Cta_Status == 'Paga') {
        //         throw new \Exception('Não é possível alterar contas já pagas!');
        //     }
        // });
        static::deleting(function ($model) {
            if ($model->Cta_Status == 'Paga') {
                throw new \Exception('Não é possível apagar contas já pagas!');
            }

            if ($model->hasRelatedRecords()) {
                throw \Exception('Has related records');
            }

            $model->attachments()->delete();
            $model->renegotiations()->delete();
        });
    }

    public function hasRelatedRecords()
    {
        return $this->simulations()->count() > 0;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'Cta_idUser', 'User_idUsuario');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'Cta_idFornecedor', 'Forn_idFornecedor');
    }

    public function billsGroup()
    {
        return $this->belongsTo(BillsGroup::class, 'Cta_idGrupo', 'GrCt_idGrupo');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class, 'Anx_idConta', 'Cta_idConta');
    }

    public function renegotiations()
    {
        return $this->hasMany(Renegotiation::class, 'Rng_idConta', 'Cta_idConta');
    }

    public function simulations(){

        return $this->belongsToMany(Simulation::Class, 'SimulationsBill', 'idSimulations', 'idBill');
    }
}
