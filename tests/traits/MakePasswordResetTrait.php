<?php

use Faker\Factory as Faker;
use App\Models\PasswordReset;
use App\Repositories\PasswordResetRepository;

trait MakePasswordResetTrait
{
    /**
     * Create fake instance of PasswordReset and save it in database
     *
     * @param array $passwordResetFields
     * @return PasswordReset
     */
    public function makePasswordReset($passwordResetFields = [])
    {
        /** @var PasswordResetRepository $passwordResetRepo */
        $passwordResetRepo = App::make(PasswordResetRepository::class);
        $theme = $this->fakePasswordResetData($passwordResetFields);
        return $passwordResetRepo->create($theme);
    }

    /**
     * Get fake instance of PasswordReset
     *
     * @param array $passwordResetFields
     * @return PasswordReset
     */
    public function fakePasswordReset($passwordResetFields = [])
    {
        return new PasswordReset($this->fakePasswordResetData($passwordResetFields));
    }

    /**
     * Get fake data of PasswordReset
     *
     * @param array $postFields
     * @return array
     */
    public function fakePasswordResetData($passwordResetFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'email' => $fake->word,
            'token' => $fake->word,
            'created_at' => $fake->word
        ], $passwordResetFields);
    }
}
