<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Session",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="userId",
 *          description="userId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="token",
 *          description="token",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ipAddress",
 *          description="ipAddress",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="userAgent",
 *          description="userAgent",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="browserName",
 *          description="browserName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="browserVersion",
 *          description="browserVersion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deviceModel",
 *          description="deviceModel",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deviceType",
 *          description="deviceType",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="deviceVendor",
 *          description="deviceVendor",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="engineName",
 *          description="engineName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="engineVersion",
 *          description="engineVersion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="osName",
 *          description="osName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="osVersion",
 *          description="osVersion",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cpuArchitecture",
 *          description="cpuArchitecture",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="boolean"
 *      )
 * )
 */
class Session extends BaseModel
{
    use SoftDeletes;
    
    const HAS_AUDIT = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'session';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'token',
        'ipAddress',
        'userAgent',
        'browserName',
        'browserVersion',
        'deviceModel',
        'deviceType',
        'deviceVendor',
        'engineName',
        'engineVersion',
        'osName',
        'osVersion',
        'cpuArchitecture',
        'createdAt',
        'updatedAt',
        'deletedAt',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'              => 'integer',
        'userId'          => 'integer',
        'token'           => 'string',
        'ipAddress'       => 'string',
        'userAgent'       => 'string',
        'browserName'     => 'string',
        'browserVersion'  => 'string',
        'deviceModel'     => 'string',
        'deviceType'      => 'string',
        'deviceVendor'    => 'string',
        'engineName'      => 'string',
        'engineVersion'   => 'string',
        'osName'          => 'string',
        'osVersion'       => 'string',
        'cpuArchitecture' => 'string',
        'createdAt'       => 'datetime',
        'updatedAt'       => 'datetime',
        'deletedAt'       => 'datetime',
        'state'           => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userId'    => 'required|integer',
        'ipAddress' => 'ip',
        'state'     => 'boolean'
    ];

    /*
     * Relations
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'userId');
    }
}
