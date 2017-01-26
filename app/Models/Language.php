<?php

namespace App\Models;

use App\BaseModel;

/**
 * @SWG\Definition(
 *      definition="Language",
 *      required={""},
 *      @SWG\Property(
 *          property="language_id",
 *          description="language_id",
 *          type="string",
 *          format="string"
 *      ),
 *      @SWG\Property(
 *          property="language",
 *          description="language",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="country",
 *          description="country",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="name_ascii",
 *          description="name_ascii",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
 *          type="boolean"
 *      )
 * )
 */
class Language extends BaseModel
{
    const HAS_AUDIT = false;
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'language';

    /**
     * The increment of primary key.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'language',
        'country',
        'name',
        'name_ascii',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'language_id' => 'string',
        'language'    => 'string',
        'country'     => 'string',
        'name'        => 'string',
        'name_ascii'  => 'string',
        'status'      => 'status'
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
