<?php

namespace App\Repositories;

use App\Models\ContactMessage;
use InfyOm\Generator\Common\BaseRepository;

class ContactMessageRepository extends BaseRepository
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
        return ContactMessage::class;
    }
}
