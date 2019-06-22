<?php

namespace App\Models;

use App\Models\BaseModel;

class Supplier extends BaseModel
{
    protected $table = 'Suppliers';
    protected $primaryKey = 'Forn_idFornecedor';

    public $fillable = [
        'Forn_idRisco',
        'Forn_CNPJ',
        'Forn_RazaoSocial',
        'Forn_NomeFantasia',
        'Forn_InscrEstadual',
        'Forn_Endereco',
        'Forn_Bairro',
        'Forn_Cidade',
        'Forn_UF',
        'Forn_CEP',
        'Forn_Banco',
        'Forn_Agencia',
        'Forn_ContaBancaria'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($model) {
            if ($model->hasRelatedRecords()) {
                throw \Exception('Has related records');
            }
            $model->deleteRelations();
        });
    }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function deleteRelations()
    {
        $this->paymentWays()->detach();

        return true;
    }

    public function risks()
    {
        return $this->hasOne(Risk::class, 'Forn_idRisco', 'Forn_idFornecedor');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idConta', 'Forn_idFornecedor');
    }

    public function paymentWays()
    {
        return $this->belongsToMany(PaymentWay::class, 'PaymentSupplier', 'idSupplier', 'idPaymentWay');
    }

}
