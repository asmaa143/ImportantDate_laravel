<?php


namespace App\Repository\Eloquent;
use App\Repository\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function create(array $input): ? Model
    {
//        $role = Role::create(['guard_name' => 'admin', 'name' => $request->input('name')]);
//        $role->syncPermissions($request->input('permission'));
        $model=$this->model->create(['guard_name' => 'admin', 'name' => $input['name']]);
        $model->syncPermissions($input['permission']);
        return $this->model->fresh();
    }
}
