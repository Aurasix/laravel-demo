<?php

use Faker\Factory as Faker;
use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;

trait MakeMenuItemTrait
{
    /**
     * Create fake instance of MenuItem and save it in database
     *
     * @param array $menuItemFields
     * @return MenuItem
     */
    public function makeMenuItem($menuItemFields = [])
    {
        /** @var MenuItemRepository $menuItemRepo */
        $menuItemRepo = App::make(MenuItemRepository::class);
        $theme = $this->fakeMenuItemData($menuItemFields);
        return $menuItemRepo->create($theme);
    }

    /**
     * Get fake instance of MenuItem
     *
     * @param array $menuItemFields
     * @return MenuItem
     */
    public function fakeMenuItem($menuItemFields = [])
    {
        return new MenuItem($this->fakeMenuItemData($menuItemFields));
    }

    /**
     * Get fake data of MenuItem
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMenuItemData($menuItemFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'menuId' => $fake->randomDigitNotNull,
            'title' => $fake->word,
            'content' => $fake->text,
            'createdAt' => $fake->word,
            'updatedAt' => $fake->word,
            'deletedAt' => $fake->word
        ], $menuItemFields);
    }
}
