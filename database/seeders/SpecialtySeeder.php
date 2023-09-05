<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Specialty::create([
            'name'=>'Desarrollo de Software',
            'descripcion'=>'Especialidad dedicada al desarrollo de diverdas aplicaciones',
            'id_area'=>1,
            'state'=>1,
        ]);
        \App\Models\Specialty::create([
            'name'=>'Seguridad informática',
            'descripcion'=>'Seguridad y privacidad de datos',
            'id_area'=>1,
            'state'=>1,
        ]);
        \App\Models\Specialty::create([
            'name'=>'Redes y telecomunicaciones',
            'descripcion'=>'Especialidad en sistemas de comunicaciones',
            'id_area'=>1,
            'state'=>1,
        ]);
        \App\Models\Specialty::create([
            'name'=>'Análisis de Datos',
            'descripcion'=>'Especialidad en el análisis de una gran cantidad de datos',
            'id_area'=>1,
            'state'=>1,
        ]);
        \App\Models\Specialty::create([
            'name'=>'Contabilidad',
            'descripcion'=>'Especialidad en el área contable',
            'id_area'=>5,
            'state'=>1,
        ]);
        \App\Models\Specialty::create([
            'name'=>'Finanzas personales',
            'descripcion'=>'Especialidad en inversiones y planificación financiera',
            'id_area'=>5,
            'state'=>1,
        ]);
    }
}
