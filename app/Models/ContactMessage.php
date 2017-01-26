<?php

namespace App\Models;

use App\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="ContactMessage",
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
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subject",
 *          description="subject",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="body",
 *          description="body",
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
class ContactMessage extends BaseModel
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'contact_message';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'subject',
        'body',
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
        'id'        => 'integer',
        'name'      => 'string',
        'email'     => 'string',
        'subject'   => 'string',
        'body'      => 'string',
        'createdBy' => 'string',
        'createdIp' => 'string',
        'updatedIp' => 'string',
        'updatedBy' => 'string',
        'deletedAt' => 'datetime',
        'state'     => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:255',
        'email' => 'required|max:255|email',
        'subject' => 'required|max:255',
        'state' => 'boolean'
    ];

    /*
     * Relations
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'email', 'email');
    }

    /*
     * Particular Repository Data
     */
    /**
     * Get The User Activity Log (Audit).
     *
     * @param string $author
     * @return mixed
     */
    public static function getUserActivity($author = '')
    {
        return self::where(['createdBy' => $author])->orderBy('updatedAt', 'desc');
    }
}
