<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *      definition="Setting",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="type",
 *          description="type",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="section",
 *          description="section",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="key",
 *          description="key",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="value",
 *          description="value",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="boolean"
 *      )
 * )
 */
class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'setting';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'section',
        'key',
        'value',
        'deletedAt',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'type'      => 'string',
        'section'   => 'string',
        'key'       => 'string',
        'value'     => 'string',
        'deletedAt' => 'datetime',
        'state'     => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        //
    ];
}
