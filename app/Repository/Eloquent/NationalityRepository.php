<?php


namespace App\Repository\Eloquent;


use App\Models\Nationality;
use App\Repository\NationalityRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class NationalityRepository extends BaseRepository implements NationalityRepositoryInterface
{
    public function __construct(Nationality $nationality)
    {
        parent::__construct($nationality);
    }


    public function updateone(array $data, $id)
    {
        $this->model->findOrFail($id)->update($data);
        return $this->model;

    }

}
