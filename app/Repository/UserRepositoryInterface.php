<?php


namespace App\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{
    public function __construct(User $user);
    public function create(array $data): ? Model;
    public function updateUser(array $data ,$id);
    public function deleteUser($id);

}
