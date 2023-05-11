<?php

namespace App\Core\Repositories;

abstract class Repository
{
    protected $modelClass, $model, $query;

    public function newInstance()
    {
        $this->model = new $this->modelClass;

        return $this->model;
    }

    public function list($filters = [], $take = 5, $paginate = false)
    {
        if(is_null($this->query)) {
            $this->query = $this->model->newQuery();
        }

        return $this->doQuery($this->query, $take, $paginate);
    }

    public function with(array $entities)
    {
        if(is_null($this->query)) {
            $this->query = $this->model->newQuery();
        }

        $this->query = $this->query->with($entities);

        return $this;
    }

    public function getId(string $id, $toArray = true)
    {
        return ($toArray) ? $this->findOrFail($id)->toArray() : $this->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function update($model, array $data, $shouldRefresh = true)
    {
        $model->update($data);

        if($shouldRefresh === false) {
            return $model;
        }

        return $model->fresh();
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function sync($model, array $ids)
    {
        return $model->sync($ids);
    }

    public function syncWithoutDetaching($model, array $ids)
    {
        return $model->syncWithoutDetaching($ids);
    }

    public function attach($model, array $ids)
    {
        return $model->attach($ids);
    }

    public function detach($model, $ids = null, $touch = true)
    {
        return $model->detach($ids, $touch);
    }

    public function findOrFail(string $id)
    {
        return $this->model->findOrFail($id);
    }

    protected function doQuery($query = null, $take = 15, $paginate = true)
    {
        if (is_null($query)) {
            $query = $this->model->newQuery();
        }

        if ($paginate) {
            return $query->paginate($take);
        }

        if ($take > 0 || false !== $take) {
            $query->take($take);
        }

        return $query->get();
    }
}
