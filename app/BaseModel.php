<?php

namespace App;

use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class BaseModel extends Model
{
    const CREATED_AT = 'createdAt';
    const UPDATED_AT = 'updatedAt';
    const DELETED_AT = 'deletedAt';

    const HAS_AUDIT = true;
    const SYSNAME_AUDIT = 'System';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['createdAt', 'updatedAt', 'deletedAt'];

    /**
     * Boot function for using with Model Events
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model)
        {
            if ($model::HAS_AUDIT) $model->generateAuditFields();
        });
    }

    /**
     * Generates audit fields: createdBy, createdIp, updatedIp, updatedBy
     *
     * @return void
     */
    protected function generateAuditFields()
    {
        #Init data
        $fullName = Auth::check()? Auth::user()->getFullName() : self::SYSNAME_AUDIT;
        $requestIp = Request::ip();

        #Set data
        if (empty($this->attributes['createdBy']) && empty($this->attributes['createdIp'])) {
            $this->attributes['createdBy'] = $fullName;
            $this->attributes['createdIp'] = $requestIp;
        }
        $this->attributes['updatedBy'] = $fullName;
        $this->attributes['updatedIp'] = $requestIp;
    }
}
