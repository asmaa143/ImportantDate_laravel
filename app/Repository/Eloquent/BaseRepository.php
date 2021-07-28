<?php


namespace App\Repository\Eloquent;
use App\Repository\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface
{

    protected $model;


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function all(array $columns=['*'],array $relations = []):Collection
    {
        return $this->model->with($relations)->get($columns);
    }

    public function allTrashed():Collection
    {
        return $this->model->onlyTrashed()->get();
    }

    public function findById(
        int $modelId,
        array $columns=['*'],
        array $relations=[],
        array $appends=[]

    ): ? Model{
        return $this->model->select($columns)->with($relations)->findOrFail($modelId)->append($appends);
    }
    public function findTrashedById( int $modelId): ? Model
    {
        return $this->model->withTrashed()->findOrFail($modelId);
    }

    public function findOnlyTrashedById(int $modelId): ? Model
    {
        return $this->model->onlyTrashed()->findOrFail($modelId);
    }

    public function create(array $payload): ? Model
    {
        $model=$this->model->create($payload);
        return $model->fresh();
    }


    public function update(array $data, $id): bool
    {
        $record = $this->model->find($id)->first();
        return $record->update($data);

    }


    public function delete($id) : bool
    {
        $record = $this->model->find($id)->first();
        return $record->delete();
    }


    public function show($id)
    {
        return $this->model->findOrFail($id);
    }


}
