<?php

namespace Api\Models;

class Supplier extends BaseModel
{

    public $fillable = [
       'Forn_CNPJ',
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

    }

    public function hasRelatedRecords()
    {
        return $this->risks()->count() > 0 || bills()->count() > 0 || contactSuppliers()->count() > 0 ||
        suppliersPaymentWays()->count() > 0;
    }

    public function risks()
    {
        return $this->hasOne(Risk::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function contactSuppliers()
    {
        return $this->hasMany(ContactSupplier::class);
    }

    public function suppliersPaymentWays()
    {
        return $this->hasMany(SupplierPaymentWay::class);
    }
    
}