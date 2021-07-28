<?php

namespace App\Http\Controllers\Admin;
use App\Repository\RoleRepositoryInterface;
use Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    private $role;

    public function __construct(RoleRepositoryInterface $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        $roles = $this->role->all();
       // $roles = Role::all();
        return view('dashboard.Role.index', compact('roles'));
    }

    public function create()
    {
        $permission = Permission::get();
        return view('dashboard.Role.create', compact('permission'));
    }

    public function store(StoreRoleRequest $request)
    {
      $this->role->create($request->all());
//        $role = Role::create(['guard_name' => 'admin', 'name' => $request->input('name')]);
//        $role->syncPermissions($request->input('permission'));
        return redirect()->route('admin.roles.index')->with(['success'=>'Role Created successfully']);
    }

    public function show(Role $role)
    {
        //
    }


    public function edit(Role $role)
    {
        $permission = Permission::get();
        $rolePermissions= $role->getAllPermissions()->pluck('name')->all();
        return view('dashboard.Role.edit', compact('role', 'permission', 'rolePermissions'));
    }


    public function update(UpdateRoleRequest $request, Role $role)
    {
//        $role->update(['name' => $request->name]);
//        $role->syncPermissions($request->input('permission'));
        $this->role->update($request->validated(), $role->id);
        return redirect()->route('admin.roles.index')->with(['success'=>'Role Updated successfully']);

    }

    public function destroy(Role $role)
    {
        $this->role->delete($role);
        return redirect()->route('admin.roles.index')->with(['success'=>'Role Deleted successfully']);
    }


}
