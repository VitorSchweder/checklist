<?php

namespace App\Repositories;

use App\Models\CakeInterestedList;
use Illuminate\Database\Eloquent\Model;

class CakesInterestedList
{
    public function __construct()
    {
        $this->model = new CakeInterestedList();
    }

    public function paginate()
    {
        return $this->model->paginate();
    }

    public function byId($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create($data)
    {
        foreach ($data as $list) {
            $this->model::create($list);
        }

        return $data;
    }

    public function delete($id)
    {
        $model = $this->model::findOrFail($id);
        return $model->delete();
    }

    public function update($data, $id)
    {
        $model = $this->model::findOrFail($id);
        $model->fill($data)->save();

        return $model;
    }
}
