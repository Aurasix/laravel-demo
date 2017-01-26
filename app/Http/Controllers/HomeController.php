<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordProfileRequest;
use App\Http\Requests\UpdatePhotoProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Repositories\UserRepository;
use Efriandika\LaravelSettings\Facades\Settings;
use Flash;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the Home Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('welcome');
    }

    /**
     * Show the Dashboard Page.
     *
     * @return mixed
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Show the Profile Page.
     *
     * @return mixed
     */
    public function profile()
    {
        $admin = Auth::user();
        $activity = $admin->getAllActivity();

        return view('admin.profile.index', compact('admin', 'activity'));
    }

    /**
     * Show the Edit Profile Page.
     *
     * @return mixed
     */
    public function editProfile()
    {
        $admin = Auth::user();

        return view('admin.profile.edit', compact('admin'));
    }

    /**
     * Update the Profile Admin.
     *
     * @param UpdateProfileRequest $request
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function updateProfile(UpdateProfileRequest $request, UserRepository $userRepository)
    {
        $input = $request->all();
        $input['receiveNews'] = !empty($input['receiveNews']);

        $userRepository->update($input, Auth::user()->id);

        Flash::success('Profile updated successfully.');

        return redirect(route('admin.profile.index'));
    }

    /**
     * Show the Change Password Page.
     *
     * @return mixed
     */
    public function changePassword()
    {
        return view('admin.profile.password');
    }

    /**
     * Update the Password Admin.
     *
     * @param UpdatePasswordProfileRequest $request
     * @param UserRepository $userRepository
     * @return mixed
     */
    public function updatePassword(UpdatePasswordProfileRequest $request, UserRepository $userRepository)
    {
        $password = $request->newPassword;

        $userRepository->update([
            'password' => $password
        ], Auth::user()->id);

        Flash::success('Password updated successfully.');

        return redirect(route('admin.profile.index'));
    }

    /**
     * Update the Photo Admin.
     *
     * @param UpdatePhotoProfileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updatePhoto(UpdatePhotoProfileRequest $request)
    {
        Auth::user()->uploadPhoto($request->image);

        Flash::success('Photo updated successfully.');

        return redirect()->back();
    }

    /**
     * Show the Settings Page.
     *
     * @return mixed
     */
    public function settings()
    {
        return view('admin.settings.index');
    }

    /**
     * Show the Edit Settings Page.
     *
     * @return mixed
     */
    public function editSettings()
    {
        return view('admin.settings.edit');
    }

    /**
     * Update the Settings fields.
     *
     * @param UpdateSettingRequest $request
     * @return mixed
     */
    public function updateSettings(UpdateSettingRequest $request)
    {
        $data = $request->all();

        #General
        Settings::set('contactEmail', $data['contactEmail']);
        Settings::set('googleAnalytics', $data['googleAnalytics']);

        #Image Upload
        Settings::set('imageMaxUploadSize', $data['imageMaxUploadSize']);
        Settings::set('imageDisplayLimit', $data['imageDisplayLimit']);

        #Url
        Settings::set('facebookUrl', $data['facebookUrl']);
        Settings::set('twitterUrl', $data['twitterUrl']);
        Settings::set('instagramUrl', $data['instagramUrl']);
        Settings::set('pinterestUrl', $data['pinterestUrl']);

        #Authentication
        Settings::set('registerEnabled', !empty($data['registerEnabled']));
        Settings::set('loginEnabled', !empty($data['loginEnabled']));
        Settings::set('facebookRegisterEnabled', !empty($data['facebookRegisterEnabled']));
        Settings::set('facebookLoginEnabled', !empty($data['facebookLoginEnabled']));
        Settings::set('twitterRegisterEnabled', !empty($data['twitterRegisterEnabled']));
        Settings::set('twitterLoginEnabled', !empty($data['twitterLoginEnabled']));
        Settings::set('instagramRegisterEnabled', !empty($data['instagramRegisterEnabled']));
        Settings::set('instagramLoginEnabled', !empty($data['instagramLoginEnabled']));
        Settings::set('pinterestRegisterEnabled', !empty($data['pinterestRegisterEnabled']));
        Settings::set('pinterestLoginEnabled', !empty($data['pinterestLoginEnabled']));

        Flash::success('Settings updated successfully.');

        return redirect(route('admin.settings.index'));
    }
}
