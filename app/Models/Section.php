<?php

namespace App\Models;

use App\BaseModel;

/**
 * @SWG\Definition(
 *      definition="Section",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pageId",
 *          description="pageId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="typeSection",
 *          description="typeSection",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="content",
 *          description="content",
 *          type="string"
 *      )
 * )
 */
class Section extends BaseModel
{
    const HAS_AUDIT = false;

    const TYPE_DEFAULT = 'Default (Only text)';
    const TYPE_PRINCIPAL_IMAGE = 'Principal Image';
    const TYPE_SLIDESHOW = 'Slideshow';
    const TYPE_TABS = 'Tabs';
    const TYPE_THREE_COLUMNS = 'Text three columns';
    const TYPE_TWO_COLUMNS = 'Text two columns';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'section';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pageId',
        'title',
        'typeSection',
        'content',
        'createdAt',
        'updatedAt',
        'deletedAt',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'pageId'      => 'integer',
        'title'       => 'string',
        'typeSection' => 'string',
        'content'     => 'string',
        'createdAt'   => 'datetime',
        'updatedAt'   => 'datetime',
        'deletedAt'   => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title'       => 'required|max:255',
        'typeSection' => 'required|max:255',
        'content'     => 'required',
    ];

    /*
     * Relations
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function page()
    {
        return $this->hasOne('App\Models\Page', 'id', 'pageId');
    }

    /*
     * Particular Repository Data
     */
    /**
     * Get All Types Section List.
     *
     * @return array
     */
    public function getAllTypesSection()
    {
        return [
            self::TYPE_DEFAULT         => 'Default (Only text)',
            self::TYPE_PRINCIPAL_IMAGE => 'Principal Image',
            self::TYPE_SLIDESHOW       => 'Slideshow',
            self::TYPE_TABS            => 'Tabs',
            self::TYPE_THREE_COLUMNS   => 'Text three columns',
            self::TYPE_TWO_COLUMNS     => 'Text two columns',
        ];
    }
}
