<?php
namespace App\Repositories;

class Repository
{
    protected $model;

    /**
     * Class constructor.
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }
    

    public function store($data)
    {
        $res = $this->model->create($data);
        return $this->find($res->id);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($data, $id)
    {
        $this->model->find($id)->update($data);
        return $this->find($id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function findU($uuid)
    {
        return $this->model->where('uuid', $uuid)->first();
    }

    public function updateU($data, $uuid)
    {
        $this->model->where('uuid', $uuid)->update($data);
        return $this->findU($uuid);
    }

    public function deleteU($uuid)
    {
        return $this->model->where('uuid', $uuid)->delete();
    }
}
