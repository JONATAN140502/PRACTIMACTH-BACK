<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\School::create([
            'code'=>'01 AD',
            'name'=>'Administración',
            'id_faculty'=>3,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'05 NI',
            'name'=>'Comercio y Negocios internacionales',
            'id_faculty'=>3,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'08 CT',
            'name'=>'Contabilidad',
            'id_faculty'=>3,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'10 EC',
            'name'=>'Economía',
            'id_faculty'=>3,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'16 IC',
            'name'=>'Escuela profesional de Ingenieria Civil',
            'id_faculty'=>6,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'18 IS',
            'name'=>'Escuela profesional de Ingenieria de Sistemas',
            'id_faculty'=>6,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'03 AR',
            'name'=>'Escuela profesional de Arquitectura',
            'id_faculty'=>6,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'02 AG',
            'name'=>'Agronomía',
            'id_faculty'=>1,
            'state'=>1,
        ]);
    }
}
