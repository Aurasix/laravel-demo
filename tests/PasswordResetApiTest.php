<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PasswordResetApiTest extends TestCase
{
    use MakePasswordResetTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePasswordReset()
    {
        $passwordReset = $this->fakePasswordResetData();
        $this->json('POST', '/api/v1/password-resets', $passwordReset);

        $this->assertApiResponse($passwordReset);
    }

    /**
     * @test
     */
    public function testReadPasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $this->json('GET', '/api/v1/password-resets/'.$passwordReset->id);

        $this->assertApiResponse($passwordReset->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $editedPasswordReset = $this->fakePasswordResetData();

        $this->json('PUT', '/api/v1/password-resets/'.$passwordReset->id, $editedPasswordReset);

        $this->assertApiResponse($editedPasswordReset);
    }

    /**
     * @test
     */
    public function testDeletePasswordReset()
    {
        $passwordReset = $this->makePasswordReset();
        $this->json('DELETE', '/api/v1/password-resets/'.$passwordReset->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/password-resets/'.$passwordReset->id);

        $this->assertResponseStatus(404);
    }
}
