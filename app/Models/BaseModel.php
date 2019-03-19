<?php

namespace Api\Models;

use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    public static function boot()
    {
        parent::boot();

        static::deleting(function($model)
        {
            if($model->hasRelatedRecords())
                throw new \Exception('You can\'t remove this record since it has related items.', 422);
        });

        static::deleted(function($model)
        {
            $model->deleteRelations();
            $model->deleteAssets();
        });
    }

    public function hasRelatedRecords()
    {
        return false;
    }

    public function deleteRelations()
    {
        return null;
    }

    public function deleteAssets()
    {
        return null;
    }

    public function getFilePath($path)
    {
        return str_replace(url('/'), '', $path);
    }
}