<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Repositories\MenuRepository;
use App\Repositories\MenuItemRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class MenuController extends InfyOmBaseController
{
    /** @var  MenuRepository */
    private $menuRepository;

    public function __construct(MenuRepository $menuRepo)
    {
        $this->menuRepository = $menuRepo;
    }

    /**
     * Display a listing of the Menu.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->menuRepository->pushCriteria(new RequestCriteria($request));
        $menus = $this->menuRepository->all();

        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new Menu.
     *
     * @return Response
     */
    public function create()
    {
        $menu = new Menu();
        return view('admin.menus.create', compact('menu'));
    }

    /**
     * Store a newly created Menu in storage.
     *
     * @param CreateMenuRequest $request
     *
     * @return Response
     */
    public function store(CreateMenuRequest $request)
    {
        $input = $request->all();

        $menu = $this->menuRepository->create($input);

        Flash::success('Menu saved successfully.');

        return redirect(route('admin.menus.show', $menu->id));
    }

    /**
     * Display the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id, MenuItemRepository $menuItemRepository)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        $menus = $this->menuRepository->findWithoutFail($id)->pluck('title', 'id');

        $menuItems = $menuItemRepository->findWhere(['menuId' => $id])->all();

        $menuItem = new MenuItem();

        $menuItem->menuId = $id;

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('admin.menus.index'));
        }

        return view('admin.menus.show', compact('menu', 'menus', 'menuItems', 'menuItem'));
    }

    /**
     * Show the form for editing the specified Menu.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('admin.menus.index'));
        }

        return view('admin.menus.edit', compact('menu'));
    }

    /**
     * Update the specified Menu in storage.
     *
     * @param  int              $id
     * @param UpdateMenuRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMenuRequest $request)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('admin.menus.index'));
        }

        $menu = $this->menuRepository->update($request->all(), $id);

        Flash::success('Menu updated successfully.');

        return redirect(route('admin.menus.show', $menu->id));
    }

    /**
     * Remove the specified Menu from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $menu = $this->menuRepository->findWithoutFail($id);

        if (empty($menu)) {
            Flash::error('Menu not found');

            return redirect(route('admin.menus.index'));
        }

        $this->menuRepository->delete($id);

        Flash::success('Menu deleted successfully.');

        return redirect(route('admin.menus.index'));
    }
}
