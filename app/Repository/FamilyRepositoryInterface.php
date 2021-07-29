<?php


namespace App\Repository;


use App\Models\Family;
use Illuminate\Database\Eloquent\Model;

interface FamilyRepositoryInterface
{
    public function __construct(Family $family);
    public function create(array $data): ? Model;
    public function updateFamily(array $data ,$id);
    public function deleteFamily($id);
}
