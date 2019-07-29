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

        static::deleting(function ($model) {
            if ($model->hasRelatedRecords()) {
                throw \Exception('Has related records');
            }
            $model->deleteRelations();
        });
    }

    public function hasRelatedRecords()
    {
        return $this->bills()->count() > 0;
    }

    public function deleteRelations()
    {
        $this->requireds()->detach();

        return true;
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'Cta_idGrupo', 'GrCt_idGrupo');
    }

    public function risks()
    {
        return $this->hasOne(Risk::class, 'GrCt_idRisco', 'GrCt_idGrupo');
    }

    public function requireds()
    {
        return $this->belongsToMany(Required::class, 'RequiredsGroup', 'idGroup', 'idRequireds');
    }
}
