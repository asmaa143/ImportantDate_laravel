<?php


namespace App\Repository\Eloquent;

use App\Repository\RoleRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function getRole()
    {
        return $this->model->pluck('name','id');
    }

    public function create(array $input): ?Model
    {
        DB::beginTransaction();
        try {
            $model = $this->model->create(['guard_name' => 'admin', 'name' => $input['name']]);
            if (isset($input['permission'])) {
                $model->syncPermissions($input['permission']);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception($e->getMessage());
        }

        DB::commit();

        return $this->model->fresh();
    }


    public function update(array $data, $id): bool
    {
        $record = $this->model->find($id);
        $record->syncPermissions($data['permission']);
        return $record->update($data);
    }
}
