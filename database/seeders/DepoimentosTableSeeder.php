<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DepoimentosTableSeeder extends Seeder
{
    // php artisan db:seed --class=DepoimentosTableSeeder
    public function run()
    {
        DB::table('depoimentos')->insert([
            [
                'id' => 2,
                'nome' => 'Ruanne Jardim',
                'avaliação' => 5,
                'depoimento' => 'Viver uma imersão com a Tchibum foi uma experiência inesquecível. Saí do básico, visitei uma comunidade e conheci sua história, culinária e sonhos.',
                'foto' => 'depoimento/01J6E6QPJ2BR2ASKW5N2X7NET9.webp',
                'ocupação' => 'Profissional de TI',
                'created_at' => Carbon::parse('2024-08-29 04:36:40'),
                'updated_at' => Carbon::parse('2024-08-29 04:36:40'),
            ],
            [
                'id' => 3,
                'nome' => 'Cleide Dantas',
                'avaliação' => 5,
                'depoimento' => 'Tchibum na Amazônia me proporcionou as melhores experiências da minha vida. Recomendo, especialmente se você ama a natureza tanto quanto eu.',
                'foto' => 'depoimento/01J6E75ESBJ36WEP4Y330KCEE0.webp',
                'ocupação' => 'Aposentada',
                'created_at' => Carbon::parse('2024-08-29 04:44:10'),
                'updated_at' => Carbon::parse('2024-08-29 04:44:10'),
            ],
            [
                'id' => 4,
                'nome' => 'Márcia Silva',
                'avaliação' => 5,
                'depoimento' => 'Viver uma imersão com a Tchibum foi uma experiência inesquecível. Saí do básico, visitei uma comunidade e conheci sua história, culinária e sonhos.',
                'foto' => 'depoimento/01J6E7NFPX0A73TT21FP4NY0F7.webp',
                'ocupação' => 'Empreendedora',
                'created_at' => Carbon::parse('2024-08-29 04:52:55'),
                'updated_at' => Carbon::parse('2024-08-29 04:52:55'),
            ],
            [
                'id' => 5,
                'nome' => 'Evandro Rabelo',
                'avaliação' => 5,
                'depoimento' => 'Tive o prazer de vivenciar diversas expedições com a Tchibum na Amazônia. A equipe é maravilhosa, profissional.',
                'foto' => 'depoimento/01J6E7YEQKA0MXX1Q55B034XME.webp',
                'ocupação' => 'Chefe Hamburgueiro',
                'created_at' => Carbon::parse('2024-08-29 04:57:49'),
                'updated_at' => Carbon::parse('2024-08-29 04:57:49'),
            ]
        ]);
    }
}
