<?php

namespace App\Models;
use App\Models\BaseModel;
class Supplier extends BaseModel
{
    protected $table = 'Suppliers';
    protected $primaryKey = 'Forn_idFornecedor';

    public $fillable = [
       'Forn_CNPJ',
       'Forn_idRisco',
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

    }

    public function deleteRelations()
    {
        $this->contactSuppliers()->delete();

        return true;
    }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function risk()
    {
        return $this->hasOne(Risk::class);
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class);
    }

    public function paymentWays()
    {
        return $this->hasMany(PaymentWay::class);
    }

}