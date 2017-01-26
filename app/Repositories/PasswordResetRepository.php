<?php

namespace App\Repositories;

use App\Models\PasswordReset;
use InfyOm\Generator\Common\BaseRepository;

class PasswordResetRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PasswordReset::class;
    }
}
