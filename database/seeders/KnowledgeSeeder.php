<?php

namespace Database\Seeders;
use App\Models\Knowledge;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KnowledgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Knowledges')->insert([
            'name'=>'JAVA',
            'descripTion'=>'Contar con conocimientos en lenguaje java',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
          DB::table('Knowledges')->insert([
            'name'=>'C#',
            'descripTion'=>'Contar con conocimientos en lenguaje C#',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
          DB::table('Knowledges')->insert([
            'name'=>'JS',
            'descripTion'=>'Contar con conocimientos en lenguaje JS',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
          DB::table('Knowledges')->insert([
            'name'=>'HTML',
            'descripTion'=>'Contar con conocimientos en HTML',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
          DB::table('Knowledges')->insert([
            'name'=>'Larabel',
            'descripTion'=>'Contar con conocimientos en Larabel',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
          DB::table('Knowledges')->insert([
            'name'=>'VUE',
            'descripTion'=>'Contar con conocimientos en VUE',
            'id_subspecialty'=>1,
            'state'=>1,
          ]);
        
    }
}
