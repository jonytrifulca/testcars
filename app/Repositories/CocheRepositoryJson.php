<?php

namespace App\Repositories;

use App\Coche;
use App\Interfaces\CocheRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CocheRepositoryJson implements CocheRepositoryInterface
{
    protected $archivo;

    /**
     * CocheRepository constructor.
     *
     * @param Coche $coche
     */
    public function __construct($rutaArchivo)
    {
        $this->archivo = $rutaArchivo;
    }

    public function all()
    {
        return json_decode(file_get_contents($this->archivo), true);
    }

    public function create(array $data)
    {

    /*    $model = array(
            'name'               =>     $_POST['name'],
            'gender'          =>     $_POST["gender"],
            'designation'     =>     $_POST["designation"]
       );  */

        $this->appendModelToFile($data);
    }

    

    private function appendModelToFile($model)
    {

        if (file_exists($this->archivo)) {
             $current_data = file_get_contents($this->archivo);
             $array_data = json_decode($current_data, true);
             $array_data[] = $model;
             $final_data = json_encode($array_data);
             file_put_contents($this->archivo, $final_data);
        } else {
             throw new Exception("file not found");
        }
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
