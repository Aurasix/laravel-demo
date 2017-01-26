<?php

use Faker\Factory as Faker;
use App\Models\Session;
use App\Repositories\SessionRepository;

trait MakeSessionTrait
{
    /**
     * Create fake instance of Session and save it in database
     *
     * @param array $sessionFields
     * @return Session
     */
    public function makeSession($sessionFields = [])
    {
        /** @var SessionRepository $sessionRepo */
        $sessionRepo = App::make(SessionRepository::class);
        $theme = $this->fakeSessionData($sessionFields);
        return $sessionRepo->create($theme);
    }

    /**
     * Get fake instance of Session
     *
     * @param array $sessionFields
     * @return Session
     */
    public function fakeSession($sessionFields = [])
    {
        return new Session($this->fakeSessionData($sessionFields));
    }

    /**
     * Get fake data of Session
     *
     * @param array $postFields
     * @return array
     */
    public function fakeSessionData($sessionFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'userId' => $fake->randomDigitNotNull,
            'token' => $fake->word,
            'ipAddress' => $fake->word,
            'userAgent' => $fake->text,
            'browserName' => $fake->word,
            'browserVersion' => $fake->word,
            'deviceModel' => $fake->word,
            'deviceType' => $fake->word,
            'deviceVendor' => $fake->word,
            'engineName' => $fake->word,
            'engineVersion' => $fake->word,
            'osName' => $fake->word,
            'osVersion' => $fake->word,
            'cpuArchitecture' => $fake->word,
            'createdAt' => $fake->word,
            'updatedAt' => $fake->word,
            'deletedAt' => $fake->word,
            'state' => $fake->word
        ], $sessionFields);
    }
}
