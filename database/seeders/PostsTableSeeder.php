<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PostsTableSeeder extends Seeder
{
    //php artisan db:seed --class=PostsTableSeeder
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => 8,
                'titulo' => 'Lançamento oficial!',
                'descricao' => 'A Amazônia te espera!',
                'conteudo' => 'Em setembro, a Tchibum abre suas portas para te levar em uma jornada inesquecível pela Amazônia...',
                'imagem_principal' => 'post/01J6JDWZNDPKPX8VV4STR1YQYW.webp',
                'imagens_secundarias' => null,
                'created_at' => Carbon::parse('2024-08-30 19:58:50'),
                'updated_at' => Carbon::parse('2024-08-30 19:58:50'),
            ],
        ]);
    }
}
