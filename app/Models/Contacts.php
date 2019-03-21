<?php

namespace Api\Models;

class Contact extends BaseModel
{
   
    public $fillable = [
        'Forn_idFornecedor',
        'Cnt_nomeContato',
        'Cnt_phoneContato',
        'Cnt_emailContato'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }


    public function hasRelatedRecords()
    {
        return $this->supplier()->count() > 0;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'Forn_idFornecedor');
    }

}