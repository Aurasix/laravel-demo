<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateSessionRequest;
use App\Http\Requests\UpdateSessionRequest;
use App\Models\Session;
use App\Repositories\SessionRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SessionController extends InfyOmBaseController
{
    /** @var  SessionRepository */
    private $sessionRepository;

    public function __construct(SessionRepository $sessionRepo)
    {
        $this->sessionRepository = $sessionRepo;
    }

    /**
     * Display a listing of the Session.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->sessionRepository->pushCriteria(new RequestCriteria($request));
        $sessions = $this->sessionRepository->all();

        return view('admin.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new Session.
     *
     * @return Response
     */
    public function create(UserRepository $userRepository)
    {
        $session = new Session();
        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');

        return view('admin.sessions.create', compact('session', 'users'));
    }

    /**
     * Store a newly created Session in storage.
     *
     * @param CreateSessionRequest $request
     *
     * @return Response
     */
    public function store(CreateSessionRequest $request)
    {
        $input = $request->all();

        $session = $this->sessionRepository->create($input);

        Flash::success('Session saved successfully.');

        return redirect(route('admin.sessions.show', $session->id));
    }

    /**
     * Display the specified Session.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $session = $this->sessionRepository->findWithoutFail($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('admin.sessions.index'));
        }

        return view('admin.sessions.show', compact('session'));
    }

    /**
     * Show the form for editing the specified Session.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id, UserRepository $userRepository)
    {
        $session = $this->sessionRepository->findWithoutFail($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('admin.sessions.index'));
        }

        $users = $userRepository->findWhere(['state' => true])->pluck('username', 'id');

        return view('admin.sessions.edit', compact('session', 'users'));
    }

    /**
     * Update the specified Session in storage.
     *
     * @param  int              $id
     * @param UpdateSessionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSessionRequest $request)
    {
        $session = $this->sessionRepository->findWithoutFail($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('admin.sessions.index'));
        }

        $session = $this->sessionRepository->update($request->all(), $id);

        Flash::success('Session updated successfully.');

        return redirect(route('admin.sessions.show', $session->id));
    }

    /**
     * Remove the specified Session from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $session = $this->sessionRepository->findWithoutFail($id);

        if (empty($session)) {
            Flash::error('Session not found');

            return redirect(route('admin.sessions.index'));
        }

        $this->sessionRepository->delete($id);

        Flash::success('Session deleted successfully.');

        return redirect(route('admin.sessions.index'));
    }
}
