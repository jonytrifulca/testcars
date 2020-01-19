<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CochesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coches')->insert([

            [
                'potencia' => 2500,
                'modelo' => 'Volvix yea',
                'marca_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'potencia' => 5500,
                'modelo' => 'A4',
                'marca_id' => 2,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'potencia' => 500,
                'modelo' => 'Ibiza',
                'marca_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ],
            [
                'potencia' => 1500,
                'modelo' => 'Leon',
                'marca_id' => 3,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]
        ]);
    }
}
