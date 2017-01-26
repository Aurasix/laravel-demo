<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePasswordResetAPIRequest;
use App\Http\Requests\API\UpdatePasswordResetAPIRequest;
use App\Models\PasswordReset;
use App\Repositories\PasswordResetRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PasswordResetController
 * @package App\Http\Controllers\API
 */

class PasswordResetAPIController extends InfyOmBaseController
{
    /** @var  PasswordResetRepository */
    private $passwordResetRepository;

    public function __construct(PasswordResetRepository $passwordResetRepo)
    {
        $this->passwordResetRepository = $passwordResetRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/password-resets",
     *      summary="Get a listing of the PasswordResets.",
     *      tags={"PasswordReset"},
     *      description="Get all PasswordResets",
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
     *                  @SWG\Items(ref="#/definitions/PasswordReset")
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
        $this->passwordResetRepository->pushCriteria(new RequestCriteria($request));
        $this->passwordResetRepository->pushCriteria(new LimitOffsetCriteria($request));
        $passwordResets = $this->passwordResetRepository->all();

        return $this->sendResponse($passwordResets->toArray(), 'PasswordResets retrieved successfully');
    }

    /**
     * @param CreatePasswordResetAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/password-resets",
     *      summary="Store a newly created PasswordReset in storage",
     *      tags={"PasswordReset"},
     *      description="Store PasswordReset",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PasswordReset that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PasswordReset")
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
     *                  ref="#/definitions/PasswordReset"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreatePasswordResetAPIRequest $request)
    {
        $input = $request->all();

        $passwordResets = $this->passwordResetRepository->create($input);

        return $this->sendResponse($passwordResets->toArray(), 'PasswordReset saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/password-resets/{id}",
     *      summary="Display the specified PasswordReset",
     *      tags={"PasswordReset"},
     *      description="Get PasswordReset",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PasswordReset",
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
     *                  ref="#/definitions/PasswordReset"
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
        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->passwordResetRepository->find($id);

        if (empty($passwordReset)) {
            return Response::json(ResponseUtil::makeError('PasswordReset not found'), 404);
        }

        return $this->sendResponse($passwordReset->toArray(), 'PasswordReset retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdatePasswordResetAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/password-resets/{id}",
     *      summary="Update the specified PasswordReset in storage",
     *      tags={"PasswordReset"},
     *      description="Update PasswordReset",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PasswordReset",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="PasswordReset that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/PasswordReset")
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
     *                  ref="#/definitions/PasswordReset"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdatePasswordResetAPIRequest $request)
    {
        $input = $request->all();

        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->passwordResetRepository->find($id);

        if (empty($passwordReset)) {
            return Response::json(ResponseUtil::makeError('PasswordReset not found'), 404);
        }

        $passwordReset = $this->passwordResetRepository->update($input, $id);

        return $this->sendResponse($passwordReset->toArray(), 'PasswordReset updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/password-resets/{id}",
     *      summary="Remove the specified PasswordReset from storage",
     *      tags={"PasswordReset"},
     *      description="Delete PasswordReset",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of PasswordReset",
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
        /** @var PasswordReset $passwordReset */
        $passwordReset = $this->passwordResetRepository->find($id);

        if (empty($passwordReset)) {
            return Response::json(ResponseUtil::makeError('PasswordReset not found'), 404);
        }

        $passwordReset->delete();

        return $this->sendResponse($id, 'PasswordReset deleted successfully');
    }
}
