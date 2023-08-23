<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class areaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Area::create([
            'name'=>'Tecnología',
            'descripcion'=>'Incluye el desarrollo de software, el diseño web, la ciberseguridad, la administración de bases de datos',
            'state'=>1
        ]);
        \App\Models\Area::create([
            'name'=>'Medicina',
            'descripcion'=>'ncluye médicos, enfermeras, y otros profesionales de la salud.',
            'state'=>1
        ]);
        \App\Models\Area::create([
            'name'=>'Comunicaciones',
            'descripcion'=>'Implica periodismo, relaciones públicas, y medios de comunicación.',
            'state'=>1
        ]);
        \App\Models\Area::create([
            'name'=>'Educación',
            'descripcion'=>'Comprende profesores, tutores y otros roles relacionados con la capacitación',
            'state'=>1
        ]);
        \App\Models\Area::create([
            'name'=>'Finanzas y economía',
            'descripcion'=>'Involucra banca, contabilidad, gestión financiera y análisis económico.',
            'state'=>1
        ]);
        \App\Models\Area::create([
            'name'=>'Sector Legal',
            'descripcion'=> 'Se centra en el derecho y sus aplicaciones',
            'state'=>1
        ]);
    }
}
