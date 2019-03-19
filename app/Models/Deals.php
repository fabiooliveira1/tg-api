<?php

namespace Api\Models;

use Carbon\Carbon;

class Deal extends BaseModel
{
    const STATUS_OPEN = 'open',
        STATUS_SOLD = 'sold',
        STATUS_LOST = 'lost',
        PERCEPTION_WARM = 'warm',
        PERCEPTION_COLD = 'cold',
        PERCEPTION_HOT = 'hot',
        PERCEPTION_NONE = 'no_perception',
        PATH_EXPORTATION = 'app/public';

    public $fillable = [
        'lead_id',
        'member_id',
        'follower_id',
        'source_id',
        'segment_id',
        'pipeline_step_id',
        'pipeline_step_order',
        'perception',
        'interests',
        'comments',
        'imported_from',
        'assigned_at',
        'imported_id',
    ];

    public $dates = ['created_at', 'updated_at', 'closed_at'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->status = self::STATUS_OPEN;
            $model->code = $model->getCode();
            if (isset($model->member_id)) {
                $model->assigned_at = Carbon::now('UTC');
            }
            if (!isset($model->perception)) {
                $model->perception = self::PERCEPTION_NONE;
            }
        });

        static::updated(function ($model) {
            if ($model->isDirty('member_id')) {
                event(new DealAssigned($model));
            }
        });
    }

    public function deleteRelations()
    {
        $this->followUps()->delete();
        $this->tasks()->delete();
        $this->emails()->delete();
        $this->attachments()->delete();

        return true;
    }

    public function hasRelatedRecords()
    {
        return $this->quotations()->count() > 0;
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function follower()
    {
        return $this->belongsTo(Member::class);
    }

    public function closedBy()
    {
        return $this->belongsTo(Member::class, 'closed_by_id');
    }

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function segment()
    {
        return $this->belongsTo(Segment::class);
    }

    public function step()
    {
        return $this->belongsTo(PipelineStep::class, 'pipeline_step_id');
    }

    public function lossReason()
    {
        return $this->belongsTo(LossReason::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function quotations()
    {
        return $this->hasMany(Quote::class);
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }

    public function getIsClosedAttribute()
    {
        return !is_null($this->closed_at);
    }

    public function scopeOpen($query)
    {
        return $query->where('status', self::STATUS_OPEN);
    }

    public function getCode()
    {
        return $this->code > 0 ? $this->code : self::codeGenerator($this);
    }

    public function setCode()
    {
        $this->code = $this->getCode();
        return $this->save();
    }

    public function setInterestsAttribute($value)
    {
        if (is_array($value)) {
            $interests = [];
            foreach ($value as $val) {
                $interests[] = $val['text'];
            }
            $value = implode(',', $interests);
        }
        $this->attributes['interests'] = $value ? $value : null;
    }

    public static function codeGenerator($deal)
    {
        $tenant = $deal->tenant;
        $newCode = $deal->tenant->deal_code_increment + 1;

        $deal->code = $newCode;
        $tenant->deal_code_increment = $newCode;
        $tenant->save();

        if (self::whereTenantId($tenant->id)->whereCode($newCode)->count() > 0) {
            return self::codeGenerator($deal);
        }

        return $newCode;
    }

    public function importedFrom()
    {
        return !empty($this->imported_from) ? $this->imported_from : null;
    }
}