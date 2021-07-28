<?php


namespace App\Repository;


use App\Models\User;

interface UserRepositoryInterface
{
    public function __construct(User $user);
}
