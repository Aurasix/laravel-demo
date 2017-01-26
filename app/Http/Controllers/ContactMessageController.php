<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateContactMessageRequest;
use App\Http\Requests\UpdateContactMessageRequest;
use App\Models\ContactMessage;
use App\Repositories\ContactMessageRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ContactMessageController extends InfyOmBaseController
{
    /** @var  ContactMessageRepository */
    private $contactMessageRepository;

    public function __construct(ContactMessageRepository $contactMessageRepo)
    {
        $this->contactMessageRepository = $contactMessageRepo;
    }

    /**
     * Display a listing of the ContactMessage.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->contactMessageRepository->pushCriteria(new RequestCriteria($request));
        $contactMessages = $this->contactMessageRepository->all();

        return view('admin.contact-messages.index', compact('contactMessages'));
    }

    /**
     * Show the form for creating a new ContactMessage.
     *
     * @return Response
     */
    public function create(UserRepository $userRepository)
    {
        $contactMessage = new ContactMessage();
        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');

        return view('admin.contact-messages.create', compact('contactMessage', 'users'));
    }

    /**
     * Store a newly created ContactMessage in storage.
     *
     * @param CreateContactMessageRequest $request
     *
     * @return Response
     */
    public function store(CreateContactMessageRequest $request)
    {
        $input = $request->all();
        $input['state'] = !empty($input['state']);

        $contactMessage = $this->contactMessageRepository->create($input);

        Flash::success('ContactMessage saved successfully.');

        return redirect(route('admin.contact-messages.show', $contactMessage->id));
    }

    /**
     * Display the specified ContactMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $contactMessage = $this->contactMessageRepository->findWithoutFail($id);

        if (empty($contactMessage)) {
            Flash::error('ContactMessage not found');

            return redirect(route('admin.contact-messages.index'));
        }

        return view('admin.contact-messages.show', compact('contactMessage'));
    }

    /**
     * Show the form for editing the specified ContactMessage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, UserRepository $userRepository)
    {
        $contactMessage = $this->contactMessageRepository->findWithoutFail($id);

        if (empty($contactMessage)) {
            Flash::error('ContactMessage not found');

            return redirect(route('admin.contact-messages.index'));
        }

        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');

        return view('admin.contact-messages.edit', compact('contactMessage', 'users'));
    }

    /**
     * Update the specified ContactMessage in storage.
     *
     * @param  int              $id
     * @param UpdateContactMessageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContactMessageRequest $request)
    {
        $contactMessage = $this->contactMessageRepository->findWithoutFail($id);

        if (empty($contactMessage)) {
            Flash::error('ContactMessage not found');

            return redirect(route('admin.contact-messages.index'));
        }

        $input = $request->all();
        $input['state'] = !empty($input['state']);

        $contactMessage = $this->contactMessageRepository->update($input, $id);

        Flash::success('ContactMessage updated successfully.');

        return redirect(route('admin.contact-messages.show', $contactMessage->id));
    }

    /**
     * Remove the specified ContactMessage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $contactMessage = $this->contactMessageRepository->findWithoutFail($id);

        if (empty($contactMessage)) {
            Flash::error('ContactMessage not found');

            return redirect(route('admin.contact-messages.index'));
        }

        $this->contactMessageRepository->delete($id);

        Flash::success('ContactMessage deleted successfully.');

        return redirect(route('admin.contact-messages.index'));
    }
}
