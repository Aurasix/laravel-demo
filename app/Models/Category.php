<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Category",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
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
class Category extends BaseModel
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
                'source' => 'name'
            ]
        ];
    }
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'createdBy',
        'createdIp',
        'updatedIp',
        'updatedBy',
        'deletedAt',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'          => 'integer',
        'name'        => 'string',
        'slug'        => 'string',
        'description' => 'string',
        'createdBy'   => 'string',
        'createdIp'   => 'string',
        'updatedIp'   => 'string',
        'updatedBy'   => 'string',
        'deletedAt'   => 'datetime',
        'state'       => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'  => 'required|max:255',
        'state' => 'boolean'
    ];

    /*
     * Relations
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleCategories()
    {
        return $this->hasMany('App\Models\ArticleCategory', 'categoryId');
    }

    /*
     * Particular Repository Data
     */
    /**
     * Is has Article.
     *
     * @param int $article
     * @return bool
     */
    public function hasArticle($article = 0)
    {
        return !empty($this->articleCategories()->where('articleId', $article)->first());
    }
}
