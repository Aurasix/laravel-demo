<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMenuItemAPIRequest;
use App\Http\Requests\API\UpdateMenuItemAPIRequest;
use App\Models\MenuItem;
use App\Repositories\MenuItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class MenuItemController
 * @package App\Http\Controllers\API
 */

class MenuItemAPIController extends InfyOmBaseController
{
    /** @var  MenuItemRepository */
    private $menuItemRepository;

    public function __construct(MenuItemRepository $menuItemRepo)
    {
        $this->menuItemRepository = $menuItemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/menuItems",
     *      summary="Get a listing of the MenuItems.",
     *      tags={"MenuItem"},
     *      description="Get all MenuItems",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/MenuItem")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->menuItemRepository->pushCriteria(new RequestCriteria($request));
        $this->menuItemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $menuItems = $this->menuItemRepository->all();

        return $this->sendResponse($menuItems->toArray(), 'MenuItems retrieved successfully');
    }

    /**
     * @param CreateMenuItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/menuItems",
     *      summary="Store a newly created MenuItem in storage",
     *      tags={"MenuItem"},
     *      description="Store MenuItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MenuItem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MenuItem")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/MenuItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateMenuItemAPIRequest $request)
    {
        $input = $request->all();

        $menuItems = $this->menuItemRepository->create($input);

        return $this->sendResponse($menuItems->toArray(), 'MenuItem saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/menuItems/{id}",
     *      summary="Display the specified MenuItem",
     *      tags={"MenuItem"},
     *      description="Get MenuItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MenuItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/MenuItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var MenuItem $menuItem */
        $menuItem = $this->menuItemRepository->find($id);

        if (empty($menuItem)) {
            return Response::json(ResponseUtil::makeError('MenuItem not found'), 404);
        }

        return $this->sendResponse($menuItem->toArray(), 'MenuItem retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateMenuItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/menuItems/{id}",
     *      summary="Update the specified MenuItem in storage",
     *      tags={"MenuItem"},
     *      description="Update MenuItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MenuItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="MenuItem that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/MenuItem")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/MenuItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateMenuItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var MenuItem $menuItem */
        $menuItem = $this->menuItemRepository->find($id);

        if (empty($menuItem)) {
            return Response::json(ResponseUtil::makeError('MenuItem not found'), 404);
        }

        $menuItem = $this->menuItemRepository->update($input, $id);

        return $this->sendResponse($menuItem->toArray(), 'MenuItem updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/menuItems/{id}",
     *      summary="Remove the specified MenuItem from storage",
     *      tags={"MenuItem"},
     *      description="Delete MenuItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of MenuItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var MenuItem $menuItem */
        $menuItem = $this->menuItemRepository->find($id);

        if (empty($menuItem)) {
            return Response::json(ResponseUtil::makeError('MenuItem not found'), 404);
        }

        $menuItem->delete();

        return $this->sendResponse($id, 'MenuItem deleted successfully');
    }
}
