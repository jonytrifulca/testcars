<?php

namespace Tests\Unit;

use App\Coche;
use PHPUnit\Framework\TestCase;

class CocheClassTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function createCocheWrongPotenciaTest()
    {
        $this->expectException("Exception");
        //$this->expectExceptionCode(100);
        //$this->expectExceptionMessage("Cannot divide by zero");
        //$this->expectExceptionMessageRegExp('/divide by zero$/');
        $coche = new Coche();
        $coche->potencia = -4;
    }

     /**
     * A basic test example.
     * @test
     * @return void
     */
    public function createCocheCorrectPotenciaTest()
    {
        $coche = new Coche();
        $coche->potencia = 4;

        $this->assertTrue($coche->potencia == 4);
    }
}
