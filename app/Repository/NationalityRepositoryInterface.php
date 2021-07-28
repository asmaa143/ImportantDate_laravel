<?php


namespace App\Repository;


use App\Models\Nationality;

interface NationalityRepositoryInterface
{
    public function __construct(Nationality $nationality);
    public function updateone(array $data, $id);

}
