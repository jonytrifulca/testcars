<?php

namespace App;

use Exception;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    protected $table = "coches";

    protected $fillable = ['marca_id','modelo','potencia'];

    //Mutator validaciones a nivel de clase de seteo de propiedades
    /*public function setModeloAttribute($modelo)
    {
        if ($modelo != "tata") {
            throw new Exception("modelo incorrecto");
        } else {
            $this->attributes['modelo'] = 'Mod ' . $modelo;
        }
    }*/

    public function setPotenciaAttribute($potencia)
    {
        if ($potencia < 0) {
            throw new Exception("Error: potencia no puede ser negativa");
        } else {
            $this->attributes['potencia'] = $potencia;
        }
    }

    //Accessor devoluciones a nivel de clase de atributos
    /*public function getModeloAttribute($modelo)
    {
        return $modelo;
    }*/

    public function marca()
    {
        return $this->belongsTo('App\Marca');
    }
}
