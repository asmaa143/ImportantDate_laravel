<?php


namespace App\Repository;


use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

interface RoleRepositoryInterface
{
    public function __construct(Role $admin);
    public function create(array $input): ? Model;
    public function update(array $data, $id): bool;
}
