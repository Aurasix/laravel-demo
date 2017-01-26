<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContactMessageAPIRequest;
use App\Http\Requests\API\UpdateContactMessageAPIRequest;
use App\Models\ContactMessage;
use App\Repositories\ContactMessageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ContactMessageController
 * @package App\Http\Controllers\API
 */

class ContactMessageAPIController extends InfyOmBaseController
{
    /** @var  ContactMessageRepository */
    private $contactMessageRepository;

    public function __construct(ContactMessageRepository $contactMessageRepo)
    {
        $this->contactMessageRepository = $contactMessageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/contact-messages",
     *      summary="Get a listing of the ContactMessages.",
     *      tags={"ContactMessage"},
     *      description="Get all ContactMessages",
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
     *                  @SWG\Items(ref="#/definitions/ContactMessage")
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
        $this->contactMessageRepository->pushCriteria(new RequestCriteria($request));
        $this->contactMessageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $contactMessages = $this->contactMessageRepository->all();

        return $this->sendResponse($contactMessages->toArray(), 'ContactMessages retrieved successfully');
    }

    /**
     * @param CreateContactMessageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/contact-messages",
     *      summary="Store a newly created ContactMessage in storage",
     *      tags={"ContactMessage"},
     *      description="Store ContactMessage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactMessage that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactMessage")
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
     *                  ref="#/definitions/ContactMessage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateContactMessageAPIRequest $request)
    {
        $input = $request->all();

        $contactMessages = $this->contactMessageRepository->create($input);

        return $this->sendResponse($contactMessages->toArray(), 'ContactMessage saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/contact-messages/{id}",
     *      summary="Display the specified ContactMessage",
     *      tags={"ContactMessage"},
     *      description="Get ContactMessage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMessage",
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
     *                  ref="#/definitions/ContactMessage"
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
        /** @var ContactMessage $contactMessage */
        $contactMessage = $this->contactMessageRepository->find($id);

        if (empty($contactMessage)) {
            return Response::json(ResponseUtil::makeError('ContactMessage not found'), 404);
        }

        return $this->sendResponse($contactMessage->toArray(), 'ContactMessage retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateContactMessageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/contact-messages/{id}",
     *      summary="Update the specified ContactMessage in storage",
     *      tags={"ContactMessage"},
     *      description="Update ContactMessage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMessage",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="ContactMessage that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/ContactMessage")
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
     *                  ref="#/definitions/ContactMessage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateContactMessageAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContactMessage $contactMessage */
        $contactMessage = $this->contactMessageRepository->find($id);

        if (empty($contactMessage)) {
            return Response::json(ResponseUtil::makeError('ContactMessage not found'), 404);
        }

        $contactMessage = $this->contactMessageRepository->update($input, $id);

        return $this->sendResponse($contactMessage->toArray(), 'ContactMessage updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/contact-messages/{id}",
     *      summary="Remove the specified ContactMessage from storage",
     *      tags={"ContactMessage"},
     *      description="Delete ContactMessage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of ContactMessage",
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
        /** @var ContactMessage $contactMessage */
        $contactMessage = $this->contactMessageRepository->find($id);

        if (empty($contactMessage)) {
            return Response::json(ResponseUtil::makeError('ContactMessage not found'), 404);
        }

        $contactMessage->delete();

        return $this->sendResponse($id, 'ContactMessage deleted successfully');
    }
}
