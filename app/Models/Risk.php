<?php

namespace Api\Models;

class Risk extends BaseModel
{

    public $fillable = [
        'Rsc_descrRisco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function hasRelatedRecords()
    {
        return $this->suppliers()->count() > 0 || billsGroups()-> count() > 0;
    }

    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'Forn_idRisco');
    }

    public function billsGroups()
    {
        return $this->belongsToMany(BillsGroup::class);
    }  

    
}