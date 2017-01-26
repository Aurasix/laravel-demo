<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Page",
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
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="createdBy",
 *          description="createdBy",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="createdIp",
 *          description="createdIp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="updatedIp",
 *          description="updatedIp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="updatedBy",
 *          description="updatedBy",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="state",
 *          description="state",
 *          type="boolean"
 *      )
 * )
 */
class Page extends BaseModel
{
    use Sluggable, SluggableScopeHelpers, SoftDeletes;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'userId',
        'title',
        'slug',
        'photo',
        'description',
        'createdBy',
        'createdIp',
        'updatedIp',
        'updatedBy',
        'deletedAt',
        'state',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'userId'      => 'integer',
        'title'       => 'string',
        'slug'        => 'string',
        'photo'       => 'string',
        'description' => 'string',
        'createdBy'   => 'string',
        'createdIp'   => 'string',
        'updatedIp'   => 'string',
        'updatedBy'   => 'string',
        'deletedAt'   => 'datetime',
        'state'       => 'boolean',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userId' => 'required|integer',
        'title'  => 'required|max:255',
        'state'  => 'boolean',
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

    /**
     * Get The User Activity Log (Audit).
     *
     * @param $author
     * @return mixed
     */
    public static function getUserActivity($author)
    {
        return self::where(['createdBy' => $author])->orderBy('updatedAt', 'desc');
    }
}
