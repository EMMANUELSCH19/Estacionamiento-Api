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
            'numero' => '1',
            'entrada' => '5:00',
            'salida' => '9:00',
            'estado' => 'Disponible',
        ],
        [
            'numero' => '2',
            'entrada' => '14:00',
            'salida' => '',
            'estado' => 'Ocupado',
        ]);
    }
}
