<?php

namespace App\Models;

use App\Models\BaseModel;

class Contacts extends BaseModel
{
    protected $table = 'Contacts';
    protected $primaryKey = 'Cnt_idContato';

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
