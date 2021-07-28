<?php


namespace App\Repository;


use App\Http\Requests\Admin\ChangePasswordRequest;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;

interface AdminRepositoryInterface
{
    public function __construct(Admin $admin);
    public function create(array $input): ? Model;
    public function update(array $data, $id): bool;
    public function delete($admin);
    public function updatePassword($password);


}
