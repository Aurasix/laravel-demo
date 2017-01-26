<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMenuItemRequest;
use App\Http\Requests\UpdateMenuItemRequest;
use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MenuItemController extends InfyOmBaseController
{
    /** @var  MenuItemRepository */
    private $menuItemRepository;

    public function __construct(MenuItemRepository $menuItemRepo)
    {
        $this->menuItemRepository = $menuItemRepo;
    }

    /**
     * Display a listing of the MenuItem.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, MenuRepository $menuRepository)
    {
        $menuItem = new MenuItem();

        $this->menuItemRepository->pushCriteria(new RequestCriteria($request));
        $menuItems = $this->menuItemRepository->all();
        $menus = $menuRepository->all();

        return view('admin.menu-items.index', compact('menuItems', 'menus', 'menuItem'));
    }

    /**
     * Show the form for creating a new MenuItem.
     *
     * @return Response
     */
    public function create(MenuRepository $menuRepository)
    {
        $menuItem = new MenuItem();
        $menus = $menuRepository->findWhere(['state' => true])->pluck('title', 'id');
        return view('admin.menu-items.create', compact('menuItem', 'menus'));
    }

    /**
     * Store a newly created MenuItem in storage.
     *
     * @param CreateMenuItemRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuItemRequest $request)
    {
        $input = $request->all();

        $menuItem = $this->menuItemRepository->create($input);

        Flash::success('Menu Item saved successfully.');

        return redirect(route('admin.menus.show', $menuItem->menuId));
    }

    /**
     * Display the specified MenuItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $menuItem = $this->menuItemRepository->findWithoutFail($id);

        if (empty($menuItem)) {
            Flash::error('Menu Item not found');

            return redirect(route('admin.menu-items.index'));
        }

        return view('admin.menu-items.show', compact('menuItem'));
    }

    /**
     * Show the form for editing the specified MenuItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, MenuRepository $menuRepository)
    {
        $menuItem = $this->menuItemRepository->findWithoutFail($id);

        if (empty($menuItem)) {
            Flash::error('Menu Item not found');

            return redirect(route('admin.menuItems.index'));
        }

        $menus = $menuRepository->findWhere(['state' => true])->pluck('title', 'id');

        return view('admin.menu-items.edit', compact('menuItem', 'menus'));
    }

    /**
     * Update the specified MenuItem in storage.
     *
     * @param  int                  $id
     * @param UpdateMenuItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuItemRequest $request)
    {

        $menuItem = $this->menuItemRepository->findWithoutFail($id);

        if (empty($menuItem)) {
            Flash::error('Menu Item not found');

            return redirect(route('admin.menu-items.index'));
        }

        $menuItem = $this->menuItemRepository->update($request->all(), $id);

        Flash::success('Menu Item updated successfully.');

        return redirect(route('admin.menus.show', $menuItem->menuId));
    }

    /**
     * Remove the specified MenuItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menuItem = $this->menuItemRepository->findWithoutFail($id);

        $menuId = $menuItem->menuId;

        if (empty($menuItem)) {
            Flash::error('Menu Item not found');

            return redirect(route('admin.menu-items.index'));
        }

        $this->menuItemRepository->delete($id);

        Flash::success('MenuItem deleted successfully.');

        return redirect(route('admin.menus.show', $menuId));
    }
}
