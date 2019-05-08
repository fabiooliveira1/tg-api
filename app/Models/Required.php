<?php

namespace App\Models;

use App\Models\BaseModel;

class Required extends BaseModel
{
    protected $table = 'Requireds';
    protected $primaryKey = 'Rq_idRequeridos';

    public $fillable = [
        'Rq_DescrRequeridos'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
    }

    public function billsGroups()
    {
        return $this->hasMany(BillsGroup::class, 'GrCt_idGrupo', 'Rq_idRequeridos');
    }
}
