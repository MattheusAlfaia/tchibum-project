<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //   \App\Models\Pacotes::factory(10)->create();

         \App\Models\Packs::factory(5)->create([
            'preco' => '400',
            'dias' => '5',
            'nome'=>'Pacote 1',
            'local'=>'Manaus',
            'info'=>'0',
            'info2'=>'0',
            'info3'=>'0',
         ]);
    }
}
