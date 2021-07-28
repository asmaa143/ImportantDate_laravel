<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\UpdateAccountRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {

    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function show(Admin $admin): View
    {
        return view('dashboard.profile.index', compact('admin'));
    }

    public function edit(Admin $admin)
    {

    }

    public function update(UpdateAccountRequest $request): RedirectResponse
    {
        $admin = \Auth::guard('admin')->user();

        if ($admin->email != $request['email'])  {
            $admin->update([
                'email_verified_at' => null,
            ]);
        }
        $admin->update($request->only('phone', 'email'));

        return redirect(route('admin.profile-setting.show',Auth::guard('admin')->user()->id))->with('success', 'Account Successfully Updated');
    }

    public function accountSettings(ChangePasswordRequest $request): RedirectResponse
    {
        $user = \Auth::guard('admin')->user();

        $user->update([
            'password' => Hash::make($request['password'])
        ]);

        return redirect(route('admin.profile-setting.show',Auth::guard('admin')->user()->id))->with('success', 'Account Successfully Updated');;
    }

    public function destroy()
    {

    }
}
