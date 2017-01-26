<?php

use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenuItemRepositoryTest extends TestCase
{
    use MakeMenuItemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MenuItemRepository
     */
    protected $menuItemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->menuItemRepo = App::make(MenuItemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMenuItem()
    {
        $menuItem = $this->fakeMenuItemData();
        $createdMenuItem = $this->menuItemRepo->create($menuItem);
        $createdMenuItem = $createdMenuItem->toArray();
        $this->assertArrayHasKey('id', $createdMenuItem);
        $this->assertNotNull($createdMenuItem['id'], 'Created MenuItem must have id specified');
        $this->assertNotNull(MenuItem::find($createdMenuItem['id']), 'MenuItem with given id must be in DB');
        $this->assertModelData($menuItem, $createdMenuItem);
    }

    /**
     * @test read
     */
    public function testReadMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $dbMenuItem = $this->menuItemRepo->find($menuItem->id);
        $dbMenuItem = $dbMenuItem->toArray();
        $this->assertModelData($menuItem->toArray(), $dbMenuItem);
    }

    /**
     * @test update
     */
    public function testUpdateMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $fakeMenuItem = $this->fakeMenuItemData();
        $updatedMenuItem = $this->menuItemRepo->update($fakeMenuItem, $menuItem->id);
        $this->assertModelData($fakeMenuItem, $updatedMenuItem->toArray());
        $dbMenuItem = $this->menuItemRepo->find($menuItem->id);
        $this->assertModelData($fakeMenuItem, $dbMenuItem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMenuItem()
    {
        $menuItem = $this->makeMenuItem();
        $resp = $this->menuItemRepo->delete($menuItem->id);
        $this->assertTrue($resp);
        $this->assertNull(MenuItem::find($menuItem->id), 'MenuItem should not exist in DB');
    }
}
