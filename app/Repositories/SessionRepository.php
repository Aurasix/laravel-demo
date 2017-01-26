<?php

namespace App\Repositories;

use App\Models\Session;
use InfyOm\Generator\Common\BaseRepository;

class SessionRepository extends BaseRepository
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
        return Session::class;
    }
}
