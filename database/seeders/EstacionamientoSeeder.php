<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstacionamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Añadir registros a la tabla _estacionamiento
        DB::table('_estacionamiento')->insert([
            'matricula' => 'ABC123',
            'numero' => '1',
            'entrada' => '5:00',
            'salida' => '9:00',
        ]);
    }
}
