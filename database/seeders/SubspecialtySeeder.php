<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subspecialty;
use Illuminate\Support\Facades\DB;

class SubspecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    protected $table = 'sub_specialties';

    public function run()
    {
        
        DB::table('sub_specialties')->insert([
            'name'=>'Desarrollo de Aplicaciones Web',
            'descripcion'=>'Proceso de creación de aplicaciones de software a las que se puede acceder y utilizar a través de un navegador web',
            'id_specialty'=>1,
            'state'=>1,
          ]);

          DB::table('sub_specialties')->insert([
            'name'=>'Desarrollo de Aplicaciones Móviles',
            'descripcion'=>'Proceso de creación de aplicaciones de software a las que se puede acceder y utilizar a través de un celular',
            'id_specialty'=>1,
            'state'=>1
          ]);
          DB::table('sub_specialties')->insert([
            'name'=>'Administrador de Bases de Datos',
            'descripcion'=>'Administrar base de datos',
            'id_specialty'=>4,
            'state'=>1
          ]);
          DB::table('sub_specialties')->insert([
            'name'=>'Administrador de Redes',
            'descripcion'=>' Mantener una red operativa, eficiente, segura',
            'id_specialty'=>4,
            'state'=>1
          ]);
          DB::table('sub_specialties')->insert([
            'name'=>'Contabilidad de costos',
            'descripcion'=>'Sub especialidad donde se encarga la planeación, clasificación, acumulación, control y asignación de costos empresariales',
            'id_specialty'=>5,
            'state'=>1
          ]);
        
    }
}
