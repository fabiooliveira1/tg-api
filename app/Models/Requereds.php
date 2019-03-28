<?php

namespace Api\Models;

class Requereds extends BaseModel
{

    public $fillable = [
        'Rq_DescrRequeridos'
    ];

    public $dates = ['created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();
        
    }
    
    public function AccountGroups()
    {
        return $this->belongsTo(AccountGroup::class);
    }

}