<?php

use App\Models\ContactMessage;
use App\Repositories\ContactMessageRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactMessageRepositoryTest extends TestCase
{
    use MakeContactMessageTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ContactMessageRepository
     */
    protected $contactMessageRepo;

    public function setUp()
    {
        parent::setUp();
        $this->contactMessageRepo = App::make(ContactMessageRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateContactMessage()
    {
        $contactMessage = $this->fakeContactMessageData();
        $createdContactMessage = $this->contactMessageRepo->create($contactMessage);
        $createdContactMessage = $createdContactMessage->toArray();
        $this->assertArrayHasKey('id', $createdContactMessage);
        $this->assertNotNull($createdContactMessage['id'], 'Created ContactMessage must have id specified');
        $this->assertNotNull(ContactMessage::find($createdContactMessage['id']), 'ContactMessage with given id must be in DB');
        $this->assertModelData($contactMessage, $createdContactMessage);
    }

    /**
     * @test read
     */
    public function testReadContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $dbContactMessage = $this->contactMessageRepo->find($contactMessage->id);
        $dbContactMessage = $dbContactMessage->toArray();
        $this->assertModelData($contactMessage->toArray(), $dbContactMessage);
    }

    /**
     * @test update
     */
    public function testUpdateContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $fakeContactMessage = $this->fakeContactMessageData();
        $updatedContactMessage = $this->contactMessageRepo->update($fakeContactMessage, $contactMessage->id);
        $this->assertModelData($fakeContactMessage, $updatedContactMessage->toArray());
        $dbContactMessage = $this->contactMessageRepo->find($contactMessage->id);
        $this->assertModelData($fakeContactMessage, $dbContactMessage->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteContactMessage()
    {
        $contactMessage = $this->makeContactMessage();
        $resp = $this->contactMessageRepo->delete($contactMessage->id);
        $this->assertTrue($resp);
        $this->assertNull(ContactMessage::find($contactMessage->id), 'ContactMessage should not exist in DB');
    }
}
