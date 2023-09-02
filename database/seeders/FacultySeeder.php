<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Faculty::create([
            'code'=>'FAG',
            'name'=>'Facultad de Agronomía',
            'descripcion'=>'Dedicada a la formación de profesionales e investigadores en ciencias agricolas',
            'state'=>1
        ]);
        \App\Models\Faculty::create([
            'code'=>'FCCBB',
            'name'=>'Facultad de Ciencias Biológicas',
            'descripcion'=>'Dedicada a la formación de profesionales e investigadores en las Ciencias Biológicas',
            'state'=>1
        ]);
        \App\Models\Faculty::create([
            'code'=>'FACEAC',
            'name'=>'Facultad de Ciencias Económicas, Administrativas y Contables',
            'descripcion'=>'Dedicada a la formación de profesionales e investigadores en ciencias economicas',
            'state'=>1
        ]);
        \App\Models\Faculty::create([
            'code'=>'FACFYM',
            'name'=>'Facultad de Ciencias Físicas y Matemáticas',
            'descripcion'=>'Dedicada a la formación de profesionales e investigadores en ciencia físicas',
            'state'=>1
        ]);
        \App\Models\Faculty::create([
            'code'=>'FACHSE',
            'name'=>'Facultad de Ciencias Histórico Sociales y Educación',
            'descripcion'=>'Dedicada a la formación de profesionales e investigadores en ciencias historicas',
            'state'=>1
        ]);
        \App\Models\Faculty::create([
            'code'=>'FICSA',
            'name'=>'Facultad de Ingeniería Civil, de Sistemas y de Arquitectura',
            'descripcion'=>'Dedicada a la formación de futuros ingenieros civiles, arquitectos y de sistemas para enfrentar los retos del mundo contemporáneo',
            'state'=>1
        ]);
    }
}
