<?php

namespace App\Models;

use App\Models\BaseModel;

class ContactSupplier extends BaseModel
{
    protected $table = 'ContactSupplier';
    protected $primaryKey = 'idContact_Supplier';

    public $fillable = [
        'idContact',
        'idSupplier'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function contact(){

        return $this->belongTo(Contact::class, 'idContact', 'Cnt_idContato');

    }

    public function supplier(){

        return $this->belongTo(Supplier::class, 'idSupplier', 'Forn_idFornecedor');

    }
}
