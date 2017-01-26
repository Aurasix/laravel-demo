<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @SWG\Definition(
 *      definition="PasswordReset",
 *      required={""},
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="token",
 *          description="token",
 *          type="string"
 *      )
 * )
 */
class PasswordReset extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'password_reset';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'email' => 'string',
        'token' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'email' => 'required|email|max:255',
        'token' => 'max:255'
    ];
}
