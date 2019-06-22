<?php

namespace App\Models;

use App\Models\BaseModel;

class Contact extends BaseModel
{
    protected $table = 'Contacts';
    protected $primaryKey = 'Cnt_idContato';

    public $fillable = [
        'Cnt_idFornecedor',
        'Cnt_nomeContato',
        'Cnt_phoneContato',
        'Cnt_emailContato'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($model) {
            if ($model->hasRelatedRecords()) {
                throw \Exception('Has related records');
            }
        });
    }

    public function hasRelatedRecords()
    {
        return $this->renegotiations()->count() > 0;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'Cnt_idFornecedor', 'Forn_idFornecedor');
    }

    public function renegotiations()
    {
        return $this->hasMany(Renegotiation::class, 'Rng_idContato', 'Cnt_idContato');
    }

    // public function deleteRelations()
    // {
    //     $this->suppliers()->delete();

    //     return true;
    // }

}
