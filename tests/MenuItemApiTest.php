<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuItemApiTest extends TestCase
{
    use MakeMenuItemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMenuItem()
    {
        $menuItem = $this->fakeMenuItemData();
        $this->json('POST', '/api/v1/menuItems', $menuItem);

        $this->assertApiResponse($menuItem);
    }

    /**
     * @test
     */
    public function testReadMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $this->json('GET', '/api/v1/menuItems/'.$menuItem->id);

        $this->assertApiResponse($menuItem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $editedMenuItem = $this->fakeMenuItemData();

        $this->json('PUT', '/api/v1/menuItems/'.$menuItem->id, $editedMenuItem);

        $this->assertApiResponse($editedMenuItem);
    }

    /**
     * @test
     */
    public function testDeleteMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $this->json('DELETE', '/api/v1/menuItems/'.$menuItem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/menuItems/'.$menuItem->id);

        $this->assertResponseStatus(404);
    }
}
