<?php

namespace App\Models;

use App\Models\BaseModel;

class Risk extends BaseModel
{
    protected $table = 'Risks';
    protected $primaryKey = 'Rsc_idRisco';

    public $fillable = [
        'Rsc_descrRisco'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    
    public function suppliers()
    {
        return $this->hasMany(Supplier::class, 'Forn_idRisco', 'Rsc_idRisco');
    }

    public function billsGroups()
    {
        return $this->hasMany(BillsGroup::class, 'GrCt_idGrupo', 'Rsc_idRisco');
    }
}
