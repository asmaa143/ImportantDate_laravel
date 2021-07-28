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
        $model=$this->model->create($input);
        $model->syncPermissions($input['permission']);
        return $this->model->fresh();
    }
}
