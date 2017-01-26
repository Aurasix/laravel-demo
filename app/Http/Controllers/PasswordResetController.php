<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Requests\CreatePasswordResetRequest;
use App\Http\Requests\UpdatePasswordResetRequest;
use App\Models\PasswordReset;
use App\Repositories\PasswordResetRepository;
use App\Http\Controllers\AppBaseController as InfyOmBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PasswordResetController extends InfyOmBaseController
{
    /** @var  PasswordResetRepository */
    private $passwordResetRepository;

    public function __construct(PasswordResetRepository $passwordResetRepo)
    {
        $this->passwordResetRepository = $passwordResetRepo;
    }

    /**
     * Display a listing of the PasswordReset.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->passwordResetRepository->pushCriteria(new RequestCriteria($request));
        $passwordResets = $this->passwordResetRepository->all();

        return view('admin.password-resets.index', compact('passwordResets'));
    }

    /**
     * Show the form for creating a new PasswordReset.
     *
     * @return Response
     */
    public function create()
    {
        $passwordReset = new PasswordReset();

        return view('admin.password-resets.create', compact('passwordReset'));
    }

    /**
     * Store a newly created PasswordReset in storage.
     *
     * @param CreatePasswordResetRequest $request
     *
     * @return Response
     */
    public function store(CreatePasswordResetRequest $request)
    {
        $input = $request->all();

        $passwordReset = $this->passwordResetRepository->create($input);

        Flash::success('PasswordReset saved successfully.');

        return redirect(route('admin.password-resets.show', $passwordReset->id));
    }

    /**
     * Display the specified PasswordReset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $passwordReset = $this->passwordResetRepository->findWithoutFail($id);

        if (empty($passwordReset)) {
            Flash::error('PasswordReset not found');

            return redirect(route('admin.password-resets.index'));
        }

        return view('admin.password-resets.show', compact('passwordReset'));
    }

    /**
     * Show the form for editing the specified PasswordReset.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $passwordReset = $this->passwordResetRepository->findWithoutFail($id);

        if (empty($passwordReset)) {
            Flash::error('PasswordReset not found');

            return redirect(route('admin.password-resets.index'));
        }

        return view('admin.password-resets.edit', compact('passwordReset'));
    }

    /**
     * Update the specified PasswordReset in storage.
     *
     * @param  int              $id
     * @param UpdatePasswordResetRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePasswordResetRequest $request)
    {
        $passwordReset = $this->passwordResetRepository->findWithoutFail($id);

        if (empty($passwordReset)) {
            Flash::error('PasswordReset not found');

            return redirect(route('admin.password-resets.index'));
        }

        $passwordReset = $this->passwordResetRepository->update($request->all(), $id);

        Flash::success('PasswordReset updated successfully.');

        return redirect(route('admin.password-resets.show', $passwordReset->id));
    }

    /**
     * Remove the specified PasswordReset from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $passwordReset = $this->passwordResetRepository->findWithoutFail($id);

        if (empty($passwordReset)) {
            Flash::error('PasswordReset not found');

            return redirect(route('admin.password-resets.index'));
        }

        $this->passwordResetRepository->delete($id);

        Flash::success('PasswordReset deleted successfully.');

        return redirect(route('admin.password-resets.index'));
    }
}
