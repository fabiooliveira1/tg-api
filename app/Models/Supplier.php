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
    }

    // public function deleteRelations()
    // {
    //     $this->risks()->delete();

    //     return true;
    // }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function risks()
    {
        return $this->hasOne(Risk::class, 'Forn_idRisco', 'Forn_idFornecedor');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idConta', 'Forn_idFornecedor');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'Cnt_idContato', 'Forn_idFornecedor');
    }

    public function paymentWays()
    {
        return $this->hasMany(PaymentWay::class, 'FrPg_idFormaPgto', 'Forn_idFornecedor');
    }

    public function paymentSupplier(){

        return $this->belongsToMany(PaymentWay::class, 'PaymentSupplier', 'idPaymentWay', 'idSupplier');

    }

    public function contactSupplier()
    {
        return $this->belongsToMany(Contact::class, 'ContactSupplier', 'idContact', 'idSupplier');
    }
}
