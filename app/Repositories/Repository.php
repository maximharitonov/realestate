<?php

namespace App\Repositories;

abstract class Repository
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->model();
    }

    abstract public function model();

    protected function index()
    {
        return [
            'data' => $this->model::all()
        ];
    }

    protected function get(array $data)
    {
        return $this->model::find($data['id']);
    }

    protected function update(int $id, array $data, string $attribute = 'affiliate_id')
    {
        return $this->model->where($attribute, $id)->update($data);
    }

    protected function delete(int $id)
    {
        return $this->model->destory($id);
    }

    protected function create(array $data)
    {
        return $this->model::create($data);
    }


}