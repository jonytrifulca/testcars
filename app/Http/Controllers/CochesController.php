<?php

namespace App\Http\Controllers;

use App\Interfaces\CocheRepositoryInterface;
use App\Interfaces\MarcaRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class CochesController extends Controller
{
    private $repository;
    private $repoMarca;

    public function __construct(CocheRepositoryInterface $repo, MarcaRepositoryInterface $repoMarca)
    {
        $this->repository = $repo;
        $this->repoMarca = $repoMarca;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coches = $this->repository->all(['marca']);
        return view('coche.index')->with('coches', $coches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = $this->repoMarca->all();
        return view('coche.create')->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->repository->create($request->except('_token'));
            $message = "Coche almacenado con éxito";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        return redirect()->action('CochesController@index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //por defecto esto devuelve un 404 not found pero podemos personalizarlo con un try-catch
        //$coche = $this->repository->find($id);
        //return view('coche.show')->with('coche', $coche);

        try {
            $coche = $this->repository->find($id);
            return view('coche.show')->with('coche', $coche);
        } catch (Exception $e) {
            $message = $e->getMessage();
            return redirect()->action('CochesController@index')->with('message', $message);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coche = $this->repository->find($id);
        $marcas = $this->repoMarca->all();
        return view('coche.edit')
        ->with('coche', $coche)
        ->with('marcas', $marcas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->repository->update($request->except(['_token','_method']), $id);
            $message = "Coche Actualizado con éxito";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }

        return redirect()->action('CochesController@index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $this->repository->delete($id);
            $message = "Coche eliminado con éxito";
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return redirect()->action('CochesController@index')->with('message', $message);
    }
}
