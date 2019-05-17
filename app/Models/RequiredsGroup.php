<?php

namespace App\Models;

use App\Models\BaseModel;

class RequiredsGroup extends BaseModel
{
    protected $table = 'RequiredsGroup';
    protected $primaryKey = 'id_Requireds_Group';

    public $fillable = [
        'idRequireds',
        'idGroup'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

    }

    public function required(){

        return $this->belongTo(Required::class, 'Rq_idRequeridos', 'idRequireds');

    }

    public function billGroup(){

        return $this->belongsToMany(BillsGroup::class, 'idGroup', 'GrCt_idGrupo');

    }
}
