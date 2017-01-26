<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactMessageApiTest extends TestCase
{
    use MakeContactMessageTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateContactMessage()
    {
        $contactMessage = $this->fakeContactMessageData();
        $this->json('POST', '/api/v1/contact-messages', $contactMessage);

        $this->assertApiResponse($contactMessage);
    }

    /**
     * @test
     */
    public function testReadContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $this->json('GET', '/api/v1/contact-messages/'.$contactMessage->id);

        $this->assertApiResponse($contactMessage->toArray());
    }

    /**
     * @test
     */
    public function testUpdateContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $editedContactMessage = $this->fakeContactMessageData();

        $this->json('PUT', '/api/v1/contact-messages/'.$contactMessage->id, $editedContactMessage);

        $this->assertApiResponse($editedContactMessage);
    }

    /**
     * @test
     */
    public function testDeleteContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $this->json('DELETE', '/api/v1/contact-messages/'.$contactMessage->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/contact-messages/'.$contactMessage->id);

        $this->assertResponseStatus(404);
    }
}
