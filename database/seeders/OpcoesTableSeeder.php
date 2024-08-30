<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OpcoesTableSeeder extends Seeder
{
    //php artisan db:seed --class=OpcoesTableSeeder
    public function run()
    {
        DB::table('opcoes')->insert([
            [
                'id' => 3,
                'nome' => 'Canoagem',
                'titulo' => 'Navegando pelas águas ancestrais com os guardiões da floresta',
                'descricao' => 'Prepare-se para uma aventura emocionante nos rios da Amazônia! Acompanhado por guias indígenas, você desvendará os mistérios da floresta. Admire a beleza da natureza, observe a rica biodiversidade e vivencie a emoção de deslizar pelas águas cristalinas. Uma experiência única para aventureiros de todas as idades.',
                'imagem' => 'opcoes/01J6E8RFMZSJG7MJGVGXWZA6GJ.webp',
                'preco' => 90.00,
                'comunidade_id' => 3,
                'created_at' => Carbon::parse('2024-08-29 05:12:03'),
                'updated_at' => Carbon::parse('2024-08-29 05:19:32'),
                'por_pessoa' => 1,
            ],
            [
                'id' => 4,
                'nome' => 'Trilha na Floresta',
                'titulo' => 'Conexão com a Natureza',
                'descricao' => 'Viva uma experiência única ao lado de comunidades indígenas e aprenda sobre seus conhecimentos ancestrais sobre a floresta. Nossa trilha te levará por caminhos tradicionais, onde você poderá observar a fauna e flora local, degustar frutos da região e participar de rituais sagrados. Uma imersão cultural completa para quem busca uma conexão mais profunda com a natureza.',
                'imagem' => 'opcoes/01J6E955FWJD3VWSMQM63C8QBE.webp',
                'preco' => 90.00,
                'comunidade_id' => 3,
                'created_at' => Carbon::parse('2024-08-29 05:18:59'),
                'updated_at' => Carbon::parse('2024-08-29 05:19:47'),
                'por_pessoa' => 1,
            ],
            [
                'id' => 5,
                'nome' => 'Passeio pela comunidade',
                'titulo' => 'Conexão',
                'descricao' => 'Conexão e conhecimento da cultura',
                'imagem' => 'opcoes/01J6E9EJ12G7NJWCWP5FHENEHK.webp',
                'preco' => 65.00,
                'comunidade_id' => 3,
                'created_at' => Carbon::parse('2024-08-29 05:24:07'),
                'updated_at' => Carbon::parse('2024-08-29 05:24:07'),
                'por_pessoa' => 1,
            ]
        ]);
    }
}
