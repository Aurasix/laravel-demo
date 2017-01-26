<?php

namespace App\Models;

use App\BaseModel;
use App\Repositories\ArticleRepository;
use App\Repositories\ContactMessageRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageManager;
use File;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

/**
 * @SWG\Definition(
 *      definition="User",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="username",
 *          description="username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="slug",
 *          description="slug",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="firstName",
 *          description="firstName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lastName",
 *          description="lastName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="password",
 *          description="password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="role",
 *          description="role",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="activated",
 *          description="activated",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="activationCode",
 *          description="activationCode",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="address",
 *          description="address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="aboutMe",
 *          description="aboutMe",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="gender",
 *          description="gender",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="phone",
 *          description="phone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="mobilePhone",
 *          description="mobilePhone",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="facebookUrl",
 *          description="facebookUrl",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="twitterUrl",
 *          description="twitterUrl",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="googlePlusUrl",
 *          description="googlePlusUrl",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="receiveNews",
 *          description="receiveNews",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="remember_token",
 *          description="remember_token",
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
class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, Sluggable, SluggableScopeHelpers, SoftDeletes;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'username'
            ]
        ];
    }

    const ROLE_ADMIN = 1;
    const ROLE_CUSTOMER = 2;

    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    const STATE_INACTIVE = 0;
    const STATE_ACTIVE = 1;

    const PUBLIC_PATH_PHOTO = 'assets/img/users/';
    const LIMIT_SIZE_WIDTH = 400;
    const LIMIT_SIZE_HEIGHT = 400;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'slug',
        'firstName',
        'lastName',
        'email',
        'password',
        'role',
        'activated',
        'activationCode',
        'address',
        'aboutMe',
        'gender',
        'birthdate',
        'photo',
        'phone',
        'mobilePhone',
        'facebookUrl',
        'twitterUrl',
        'googlePlusUrl',
        'receiveNews',
        'remember_token',
        'createdBy',
        'createdIp',
        'createdAt',
        'updatedAt',
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
        'id'             => 'integer',
        'username'       => 'string',
        'slug'           => 'string',
        'firstName'      => 'string',
        'lastName'       => 'string',
        'email'          => 'string',
        'password'       => 'string',
        'role'           => 'integer',
        'activated'      => 'boolean',
        'activationCode' => 'string',
        'address'        => 'string',
        'aboutMe'        => 'string',
        'gender'         => 'string',
        'birthdate'      => 'datetime',
        'photo'          => 'string',
        'phone'          => 'string',
        'mobilePhone'    => 'string',
        'facebookUrl'    => 'string',
        'twitterUrl'     => 'string',
        'googlePlusUrl'  => 'string',
        'receiveNews'    => 'boolean',
        'remember_token' => 'string',
        'createdBy'      => 'string',
        'createdIp'      => 'string',
        'createdAt'      => 'datetime',
        'updatedAt'      => 'datetime',
        'updatedIp'      => 'string',
        'updatedBy'      => 'string',
        'deletedAt'      => 'datetime',
        'state'          => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'username'       => 'required|max:255|alpha_dash|unique:user,username',
        'image'          => 'image',
        'firstName'      => 'required|max:255',
        'lastName'       => 'required|max:255',
        'email'          => 'required|max:255|email|unique:user,email',
        'password'       => 'min:6|max:255',
        'role'           => 'required|integer',
        'activated'      => 'boolean',
        'activationCode' => 'max:255',
        'address'        => 'max:255',
        'gender'         => 'max:6',
        'birthdate'      => 'date_format:Y-m-d',
        'phone'          => 'max:64',
        'mobilePhone'    => 'max:64',
        'facebookUrl'    => 'max:1020|url',
        'twitterUrl'     => 'max:1020|url',
        'googlePlusUrl'  => 'max:1020|url',
        'receiveNews'    => 'boolean',
        'state'          => 'boolean'
    ];

    /*
     * Relations
     */


    /*
     * Particular Repository Data
     */

    /**
     * Set Securty Password.
     *
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Set Correct Birthdate.
     *
     * @param $value
     */
    public function setBirthdateAttribute($value)
    {
        $birthdate = !empty($value)? $value : null;

        $this->attributes['birthdate'] = $birthdate;
    }

    /**
     * Get FullName from firstName and lastName.
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    /**
     * Get List of all Roles.
     *
     * @return array
     */
    public function getAllRoles()
    {
        return [ self::ROLE_ADMIN => 'Admin', self::ROLE_CUSTOMER => 'customer' ];
    }

    /**
     * Get List of all Genders.
     *
     * @return array
     */
    public function getAllGenders()
    {
        return [ self::GENDER_MALE => 'Male', self::GENDER_FEMALE => 'Female' ];
    }

    /**
     * Get correct Birthdate.
     *
     * @return string
     */
    public function getBirthdate()
    {
        if (!empty($this->birthdate) && $this->birthdate->timestamp > 0) return $this->birthdate->format('Y-m-d');

        return '';
    }

    /**
     * Upload & Save the Photo User.
     *
     * @param $photo
     */
    public function uploadPhoto($photo)
    {
        if (!empty($photo) && !$photo->getError()) {
            if(!empty($this->photo)) {
                $this->removePhoto();
            }

            $file = $photo->getClientOriginalName();
            $name = sha1(time() . '_' . str_slug(pathinfo($file, PATHINFO_FILENAME))) . '.jpg';
            $publicPath = self::PUBLIC_PATH_PHOTO . $name;

            #Save Photo
            $photoUploaded = ImageManager::make($photo->getRealPath());
            $photoUploaded->resize(self::LIMIT_SIZE_WIDTH, self::LIMIT_SIZE_HEIGHT, function($constraint){ $constraint->aspectRatio(); });
            $photoUploaded->resizeCanvas(self::LIMIT_SIZE_WIDTH, self::LIMIT_SIZE_HEIGHT, 'center', false, '#000000')->save(public_path($publicPath));

            $this->update([
                'photo'  => $publicPath
            ]);
        }
    }

    /**
     * Remove the Photo User Completely.
     *
     * @return bool|int
     */
    public function removePhoto()
    {
        if (file_exists(public_path($this->photo))) {
            File::delete(public_path($this->photo));
        }

        return $this->update([
            'photo' => null
        ]);
    }

    /**
     * Get Real Photo Path.
     *
     * @return mixed
     */
    public function getRealPhoto()
    {
        if (!empty($this->photo)) return asset($this->photo);

        return asset(self::PUBLIC_PATH_PHOTO . 'default.png');
    }

    /**
     * Get All The User Activity List (Audit).
     *
     * @return array
     */
    public function getAllActivity()
    {
        $author = Auth::user()->getFullname();             

        return [
            'users' => self::getUserActivity($author),
            'contactMessages' => ContactMessage::getUserActivity($author),
            'articles' => Article::getUserActivity($author)
        ];
    }

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
