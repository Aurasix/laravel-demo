<?php

namespace App\Models;

use App\BaseModel;

class ArticleTag extends BaseModel
{
    const HAS_AUDIT = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'article_tag';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'articleId',
        'tagId',
        'state'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'articleId' => 'integer',
        'tagId'     => 'integer',
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
