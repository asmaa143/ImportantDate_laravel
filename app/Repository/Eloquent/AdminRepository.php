<?php


namespace App\Repository\Eloquent;

use App\Models\Admin;
use App\Repository\AdminRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    public function __construct(Admin $admin)
    {
        parent::__construct($admin);
    }

    public function create(array $input): ? Model
    {
        $model=$this->model->create($input);
        $model->assignRole($input['roles']);
        return $model->fresh();
    }

    public function update(array $data, $id): bool
    {
        $record = $this->model->find($id);
        $record->syncRoles($data['roles']);
        return $record->update($data);
    }

    public function updatePassword($password)
    {
        $user = \Auth::guard('admin')->user();

        $user->update([
            'password' => Hash::make($password)
        ]);
    }


     public function delete($admin) : bool
    {
        $record = $this->model->find($admin);
        return $record->delete();
    }

}
