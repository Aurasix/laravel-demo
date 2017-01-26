<?php

namespace App\Models;

use App\BaseModel;

/**
 * @SWG\Definition(
 *      definition="MenuItem",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="menuId",
 *          description="menuId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="title",
 *          description="title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="content",
 *          description="content",
 *          type="string"
 *      )
 * )
 */
class MenuItem extends BaseModel
{
    const HAS_AUDIT = false;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'menu_item';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menuId',
        'title',
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
        'id'        => 'integer',
        'menuId'    => 'integer',
        'title'     => 'string',
        'content'   => 'string',
        'createdAt' => 'datetime',
        'updatedAt' => 'datetime',
        'deletedAt' => 'datetime',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title'   => 'required|max:255',
        'content' => 'required',
    ];

    /*
     * Relations
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function menu()
    {
        return $this->hasOne('App\Models\Menu', 'id', 'menuId');
    }
}
