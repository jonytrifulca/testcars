<?php

namespace App\Repositories;

use App\Marca;
use App\Interfaces\MarcaRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MarcaRepositoryEloquent implements MarcaRepositoryInterface
{
    protected $model;

    /**
     * CocheRepository constructor.
     *
     * @param Marca $Marca
     */
    public function __construct(Marca $marca)
    {
        $this->model = $marca;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $marca = $this->model->find($id)) {
            throw new ModelNotFoundException("Marca not found");
        }

        return $marca;
    }
}
