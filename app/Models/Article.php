<?php

namespace App\Models;

use App\BaseModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Article",
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
class Article extends BaseModel
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
    protected $table = 'article';

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
        'state'
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
        'state'       => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'userId' => 'required|integer',
        'title'  => 'required|max:255',
        'state'  => 'boolean'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleCategories()
    {
        return $this->hasMany('App\Models\ArticleCategory', 'articleId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articleTags()
    {
        return $this->hasMany('App\Models\ArticleTag', 'articleId');
    }

    /*
     * Particular Repository Data
     */
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

    /**
     * Get direct relation to Categories.
     *
     * @return mixed
     */
    public function getCategories()
    {
        return Category::whereIn('id', $this->articleCategories()->pluck('categoryId'))->orderBy('name', 'asc');
    }

    /**
     * Get direct relation to Tags.
     *
     * @return mixed
     */
    public function getTags()
    {
        return Tag::whereIn('id', $this->articleTags()->pluck('tagId'))->orderBy('name', 'asc');
    }

    /**
     * Get Tags List.
     *
     * @return array
     */
    public function getTagsList()
    {
        $tags = $this->getTags()->get();
        $tagsList = [];
        foreach ($tags as $tag) {
            $tagsList[$tag->name] = $tag->name;
        }

        return $tagsList;
    }

    /**
     * Reload own categories.
     *
     * @param array $inputs
     */
    public function updateCategories($inputs = [])
    {
        if ($inputs === NULL) $inputs = [];
        $blackList = $this->getCategories()->pluck('id')->toArray();
        $data = ['articleId' => $this->id];

        foreach ($inputs as $input) {
            $data['categoryId'] = intval($input);
            $articleCategory = ArticleCategory::where($data)->first();

            if (empty($articleCategory)) {
                ArticleCategory::create($data);
            }else{
                $articleCategory->update();
                array_forget($blackList, array_search($input, $blackList));
            }
        }

        foreach ($blackList as $category) {
            ArticleCategory::where(['articleId' => $this->id, 'categoryId' => $category])->first()->delete();
        }
    }

    /**
     * Reload own tags.
     *
     * @param array $inputs
     */
    public function updateTags($inputs = [])
    {
        if ($inputs === NULL) $inputs = [];
        $blackList = $this->getTags()->pluck('name')->toArray();
        $data = ['articleId' => $this->id];

        foreach ($inputs as $input) {
            $tag = Tag::firstOrNew(['name' => $input]);
            if (!$tag->exists) $tag->save();
            $data['tagId'] = $tag->id;

            $articleTag = ArticleTag::where($data)->first();

            if (empty($articleTag)) {
                ArticleTag::create($data);
            }else{
                $articleTag->update();
                array_forget($blackList, array_search($input, $blackList));
            }
        }

        foreach ($blackList as $tag) {
            ArticleTag::where(['articleId' => $this->id, 'tagId' => $tag])->first()->delete();
        }
    }
}
