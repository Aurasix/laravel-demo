<?php

use Faker\Factory as Faker;
use App\Models\User;
use App\Repositories\UserRepository;

trait MakeUserTrait
{
    /**
     * Create fake instance of User and save it in database
     *
     * @param array $userFields
     * @return User
     */
    public function makeUser($userFields = [])
    {
        /** @var UserRepository $userRepo */
        $userRepo = App::make(UserRepository::class);
        $theme = $this->fakeUserData($userFields);
        return $userRepo->create($theme);
    }

    /**
     * Get fake instance of User
     *
     * @param array $userFields
     * @return User
     */
    public function fakeUser($userFields = [])
    {
        return new User($this->fakeUserData($userFields));
    }

    /**
     * Get fake data of User
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUserData($userFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'username' => $fake->word,
            'slug' => $fake->word,
            'firstName' => $fake->word,
            'lastName' => $fake->word,
            'email' => $fake->word,
            'password' => $fake->word,
            'role' => $fake->word,
            'activated' => $fake->word,
            'activationCode' => $fake->word,
            'address' => $fake->word,
            'aboutMe' => $fake->text,
            'gender' => $fake->word,
            'birthdate' => $fake->word,
            'photo' => $fake->word,
            'phone' => $fake->word,
            'mobilePhone' => $fake->word,
            'facebookUrl' => $fake->word,
            'twitterUrl' => $fake->word,
            'googlePlusUrl' => $fake->word,
            'receiveNews' => $fake->word,
            'remember_token' => $fake->word,
            'createdBy' => $fake->word,
            'createdIp' => $fake->word,
            'createdAt' => $fake->word,
            'updatedAt' => $fake->word,
            'updatedIp' => $fake->word,
            'updatedBy' => $fake->word,
            'deletedAt' => $fake->word,
            'state' => $fake->word
        ], $userFields);
    }
}
