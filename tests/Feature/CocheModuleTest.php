<?php

namespace Tests\Feature;

use App\Coche;
use App\Marca;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CocheModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function cochesCanList()
    {
        $this->get('/coches')
            ->assertStatus(200)
            ->assertSee('listado coches');
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function cochesCanCreate()
    {
        $marca = new Marca();
        $marca->marca = "marcatest";
        $marca->save();
        
        $coche = new Coche();
        $coche->modelo = "testmodel";
        $coche->marca_id = 1;
        $coche->potencia = 4500;
        $coche->save();

        return $this->post('/coches/create', $coche->toArray())->assertSee('Coche almacenado');
        //It gets stored in the database
        //$this->assertDatabaseHas('coches', ['id' => $coche->id , 'modelo' => $coche->modelo,'potencia' => $coche->potencia]);
    }


    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function cochesCanShow()
    {
        $marca = new Marca();
        $marca->marca = "marcatest";
        $marca->save();
        
        $coche = new Coche();
        $coche->modelo = "testmodel";
        $coche->marca_id = 1;
        $coche->potencia = 4500;
        $coche->save();

        $this->get('/coches/' . $coche->id)
            ->assertStatus(200)
            ->assertSee('testmodel');
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function cochesCanDelete()
    {
        $marca = new Marca();
        $marca->marca = "marcatest";
        $marca->save();
        
        $coche = new Coche();
        $coche->modelo = "testmodel";
        $coche->marca_id = 1;
        $coche->potencia = 4500;
        $coche->save();

        $this->delete('/coches/' . $coche->id);
        //The task should be deleted from the database.
        $this->assertDatabaseMissing('coches', ['id' => $coche->id]);
    }

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function cochesCanUpdate()
    {
        $marca = new Marca();
        $marca->marca = "marcatest";
        $marca->save();
        
        $coche = new Coche();
        $coche->modelo = "testmodel";
        $coche->marca_id = 1;
        $coche->potencia = 4500;
        $coche->save();

        $coche->modelo = "updatedmodel";
        $coche->potencia = 200;
        $this->patch('/coches/' . $coche->id, $coche->toArray());
        $this->assertDatabaseHas('coches', ['id' => $coche->id , 'modelo' => 'updatedmodel','potencia' => 200]);
    }
}
