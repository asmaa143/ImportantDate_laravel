<?php

namespace App\Http\Controllers\Admin;

use App\Repository\AdminRepositoryInterface;
use App\Repository\RoleRepositoryInterface;
use Auth;
use DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    private $admin, $role;

    public function __construct(AdminRepositoryInterface $admin, RoleRepositoryInterface $roleRepository)
    {
        $this->admin = $admin;
        $this->role = $roleRepository;
        $this->middleware('permission:read_Admin,admin', ['only' => ['index']]);
    }

    public function index(): View
    {
//           dd( Auth::guard('admin')->user()->hasPermissionTo('read_Admin'));
//        $this->authorizeForUser(\Auth::guard('admin')->user(),'read_Admin');
        $admins = $this->admin->all();
        //$admin = Admin::all();
        return view('dashboard.Admin.admin', compact('admins'));
    }

    public function create(): View
    {
        // $roles = Role::pluck('name','id');
        $roles = $this->role->getRole();
        return view('dashboard.Admin.create')->with(['roles' => $roles]);

    }

    public function store(StoreAdminRequest $request): RedirectResponse
    {
        $this->admin->create($request->all());
//        $input = $request->all();
//        $admin = Admin::create($input);
//        $admin->assignRole($request->input('roles'));
        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Created successfully']);
    }

    public function show($id)
    {

    }

    public function edit(Admin $admin): View
    {
        //$roles = Role::pluck('name','id')->all();
        $roles = $this->role->getRole()->all();
        $adminRole = $admin->roles->pluck('name')->first();
        return view('dashboard.Admin.edit', compact('admin', 'roles', 'adminRole'));
    }

    public function update(UpdateAdminRequest $request, Admin $admin): RedirectResponse
    {


        $this->admin->update($request->validated(), $admin->id);
//        $input = $request->all();
//        $admin->update($input);
//        $admin->syncRoles($request->roles);
        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Updated successfully']);
    }

    public function destroy(Request $request, Admin $admin): RedirectResponse
    {
        $this->authorizeForUser(\Auth::guard('admin')->user(), 'delete_Admin');
        if ($admin->getRoleNames()->first() == 'super-admin') {
            abort('403');
        }
        $data = $request->validate([
            'admin-mail' => 'required|email',
        ]);
        if (\Auth::guard('admin')->user()->deleted_at == null) {
            if (\Auth::guard('admin')->user()->email == $data['admin-mail']) {
                $admin->delete();
                \Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with(['suspended' => 'Your account is deactivated']);
            }
        }
        $this->admin->delete($admin->id);

        // $admin->delete();
        return redirect()->route('admin.admins.index')->with(['success' => 'Admin Deleted successfully']);
    }


    public function password(ChangePasswordRequest $request): RedirectResponse
    {
//        $user = \Auth::guard('admin')->user();
//
//        $user->update([
//            'password' => Hash::make($request['password'])
//        ]);
        $this->admin->updatePassword($request['password']);
        return redirect(route('admin.admins.index'))->with(['success' => 'Password Changed successfully']);
    }
}
