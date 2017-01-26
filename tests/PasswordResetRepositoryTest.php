<?php

use App\Models\PasswordReset;
use App\Repositories\PasswordResetRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PasswordResetRepositoryTest extends TestCase
{
    use MakePasswordResetTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PasswordResetRepository
     */
    protected $passwordResetRepo;

    public function setUp()
    {
        parent::setUp();
        $this->passwordResetRepo = App::make(PasswordResetRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePasswordReset()
    {
        $passwordReset = $this->fakePasswordResetData();
        $createdPasswordReset = $this->passwordResetRepo->create($passwordReset);
        $createdPasswordReset = $createdPasswordReset->toArray();
        $this->assertArrayHasKey('id', $createdPasswordReset);
        $this->assertNotNull($createdPasswordReset['id'], 'Created PasswordReset must have id specified');
        $this->assertNotNull(PasswordReset::find($createdPasswordReset['id']), 'PasswordReset with given id must be in DB');
        $this->assertModelData($passwordReset, $createdPasswordReset);
    }

    /**
     * @test read
     */
    public function testReadPasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $dbPasswordReset = $this->passwordResetRepo->find($passwordReset->id);
        $dbPasswordReset = $dbPasswordReset->toArray();
        $this->assertModelData($passwordReset->toArray(), $dbPasswordReset);
    }

    /**
     * @test update
     */
    public function testUpdatePasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $fakePasswordReset = $this->fakePasswordResetData();
        $updatedPasswordReset = $this->passwordResetRepo->update($fakePasswordReset, $passwordReset->id);
        $this->assertModelData($fakePasswordReset, $updatedPasswordReset->toArray());
        $dbPasswordReset = $this->passwordResetRepo->find($passwordReset->id);
        $this->assertModelData($fakePasswordReset, $dbPasswordReset->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $resp = $this->passwordResetRepo->delete($passwordReset->id);
        $this->assertTrue($resp);
        $this->assertNull(PasswordReset::find($passwordReset->id), 'PasswordReset should not exist in DB');
    }
}
