<?php

use Faker\Factory as Faker;
use App\Models\ContactMessage;
use App\Repositories\ContactMessageRepository;

trait MakeContactMessageTrait
{
    /**
     * Create fake instance of ContactMessage and save it in database
     *
     * @param array $contactMessageFields
     * @return ContactMessage
     */
    public function makeContactMessage($contactMessageFields = [])
    {
        /** @var ContactMessageRepository $contactMessageRepo */
        $contactMessageRepo = App::make(ContactMessageRepository::class);
        $theme = $this->fakeContactMessageData($contactMessageFields);
        return $contactMessageRepo->create($theme);
    }

    /**
     * Get fake instance of ContactMessage
     *
     * @param array $contactMessageFields
     * @return ContactMessage
     */
    public function fakeContactMessage($contactMessageFields = [])
    {
        return new ContactMessage($this->fakeContactMessageData($contactMessageFields));
    }

    /**
     * Get fake data of ContactMessage
     *
     * @param array $postFields
     * @return array
     */
    public function fakeContactMessageData($contactMessageFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'userId' => $fake->randomDigitNotNull,
            'email' => $fake->word,
            'subject' => $fake->word,
            'body' => $fake->text,
            'createdBy' => $fake->word,
            'createdIp' => $fake->word,
            'createdAt' => $fake->word,
            'updatedAt' => $fake->word,
            'updatedIp' => $fake->word,
            'updatedBy' => $fake->word,
            'deletedAt' => $fake->word,
            'state' => $fake->word
        ], $contactMessageFields);
    }
}
