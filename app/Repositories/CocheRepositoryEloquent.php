<?php

namespace App\Repositories;

use App\Coche;
use App\Interfaces\CocheRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CocheRepositoryEloquent implements CocheRepositoryInterface
{
    protected $model;

    /**
     * CocheRepository constructor.
     *
     * @param Coche $coche
     */
    public function __construct(Coche $coche)
    {
        $this->model = $coche;
    }

    //array para eager loading
    public function all(array $relationships = [])
    {
        return $this->model::with($relationships)->get();
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
        if (null == $coche = $this->model->find($id)) {
            throw new Exception("Imposible eliminar: Coche no encontrado");
        } else {
            return $this->model->destroy($id);
        }
    }

    public function find($id)
    {
        if (null == $coche = $this->model->find($id)) {
            throw new ModelNotFoundException("Coche no encontrado");
        }

        return $coche;
    }

    public function getModel()
    {
        return $this->model;
    }
}
