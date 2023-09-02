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
            'code'=>'EPIC-49',
            'name'=>'Escuela profesional de Ingenieria Civil',
            'id_faculty'=>6,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'EPIS-48',
            'name'=>'Escuela profesional de Ingenieria de Sistemas',
            'id_faculty'=>6,
            'state'=>1,
        ]);
        \App\Models\School::create([
            'code'=>'EPA-50',
            'name'=>'Escuela profesional de Arquitectura',
            'id_faculty'=>6,
            'state'=>1,
        ]);
    }
}
