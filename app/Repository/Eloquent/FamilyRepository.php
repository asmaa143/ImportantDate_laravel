<?php


namespace App\Repository\Eloquent;


use App\Models\Family;
use App\Repository\FamilyRepositoryInterface;

class FamilyRepository extends BaseRepository implements FamilyRepositoryInterface
{
    public function __construct(Family $family)
    {
        parent::__construct($family);
    }
}
