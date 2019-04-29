<?php

namespace App\Models;
use App\Models\BaseModel;

class BillsGroup extends BaseModel
{
    protected $table = 'Bills_group';
    protected $primaryKey = 'GrCt_idGrupo';

    public $fillable = [
        'GrCt_idRisco',
        'GrCt_NomeGrupo',
        'GrCt_DescrGrupo'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();


    }

    public function bill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function risk()
    {
        return $this->hasOne(Risk::class);
    }

    public function requereds()
    {
        return $this->hasMany(Requered::class);
    }

}