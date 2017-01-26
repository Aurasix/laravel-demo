<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class UserController extends InfyOmBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->userRepository->pushCriteria(new RequestCriteria($request));
        $users = $this->userRepository->all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        $user = new User();

        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['activated'] = !empty($input['activated']);
        $input['receiveNews'] = !empty($input['receiveNews']);
        $input['state'] = !empty($input['state']);

        $user = $this->userRepository->create($input);

        $user->uploadPhoto($request->image);

        Flash::success('User saved successfully.');

        return redirect(route('admin.users.show', $user->id));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $input = $request->all();
        $input['activated'] = !empty($input['activated']);
        $input['receiveNews'] = !empty($input['receiveNews']);
        $input['state'] = !empty($input['state']);

        $user = $this->userRepository->update($input, $id);

        $user->uploadPhoto($request->image);

        Flash::success('User updated successfully.');

        return redirect(route('admin.users.show', $user->id));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('admin.users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the Photo User.
     *
     * @param Request $request
     * @return mixed
     */
    public function removePhoto(Request $request)
    {
        $user = User::findOrFail($request->id);

        return response()->json(['success' => $user->removePhoto()]);
    }
}
