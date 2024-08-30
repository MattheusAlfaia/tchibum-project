<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PacotesTableSeeder extends Seeder
{
    //php artisan db:seed --class=PacotesTableSeeder
    public function run()
    {
        DB::table('pacotes')->insert([
            [
                'id' => 3,
                'nome' => 'ANO NOVO NA AMAZÔNIA',
                'titulo' => 'Celebre o Ano Novo em Harmonia com a Natureza: Viva uma Experiência Única na Amazônia',
                'descricao' => 'Seu roteiro inclui: Transporte: Ida e volta para a comunidade. Acomodação: Hospedagem em casa de família. Alimentação: Todas as refeições incluídas (café da manhã, almoço e jantar). Atividades: Todas as atividades descritas no roteiro. Guia local: Acompanhamento por um guia experiente.',
                'imagem_principal' => 'pacote/01J6E9MQD5R7ZKVQJ97FVHHEK3.webp',
                'imagens_secundarias' => '["pacote\\/01J6E9MRKGQAFCJ5FCGFC9B131.webp","pacote\\/01J6JGY4FQP3X7P8NDRX3A1HF1.webp","pacote\\/01J6JGY4QBKGA70D634738P73E.webp"]',
                'preco' => 3050.00,
                'data' => Carbon::parse('2024-12-30 00:00:00'),
                'data_final' => Carbon::parse('2025-01-02 00:00:00'),
                'infos' => 'Mergulhe na cultura indígena e na natureza exuberante da Comunidade Três Unidos!',
                'video' => 'pacote/01J6E9MRPTYKSBNYWC6BWQQZJR.mp4',
                'pessoas' => 20,
                'dias' => null,
                'comunidade_id' => 3,
                'created_at' => Carbon::parse('2024-08-29 05:27:29'),
                'updated_at' => Carbon::parse('2024-08-30 20:51:54'),
            ],
            [
                'id' => 4,
                'nome' => 'CARNAVAL AMAZÔNICO',
                'titulo' => 'EXPERIÊNCIA IMERSIVA NA AMAZÔNIA EM 2025',
                'descricao' => 'Venha celebrar o Carnaval mais autêntico da região na Comunidade Três Unidos! De 01 a 03 de março, prepare-se para viver uma experiência única com muita música, dança, gastronomia e a calorosa energia do povo amazonense',
                'imagem_principal' => 'pacote/01J6JD6YH1WTNKRXDF9Z0R6WTR.webp',
                'imagens_secundarias' => '["pacote\\/01J6JD6YK13FBZ5CJE97E8XCM1.webp"]',
                'preco' => 3200.00,
                'data' => Carbon::parse('2025-03-01 00:00:00'),
                'data_final' => Carbon::parse('2025-03-03 00:00:00'),
                'infos' => 'Mergulhe na cultura indígena e na natureza exuberante da Comunidade Três Unidos!',
                'video' => 'pacote/01J6JD6YNNR8VGBCQA5HS5XK5B.mp4',
                'pessoas' => 20,
                'dias' => null,
                'comunidade_id' => 2,
                'created_at' => Carbon::parse('2024-08-30 19:46:48'),
                'updated_at' => Carbon::parse('2024-08-30 19:56:03'),
            ],
            [
                'id' => 5,
                'nome' => 'PÁSCOA NA AMAZÔNIA',
                'titulo' => 'Uma Celebração Inesquecível!',
                'descricao' => 'Seu pacote inclui: Transporte: Ida e volta para a comunidade. Acomodação: Hospedagem em casa de família. Alimentação: Todas as refeições incluídas (café da manhã, almoço e jantar). Atividades: Todas as atividades descritas no roteiro. Guia local: Acompanhamento por um guia experiente.',
                'imagem_principal' => 'pacote/01J6JE82M90MZBVNC9NGWKEDHM.webp',
                'imagens_secundarias' => '["pacote\\/01J6JE82TM4XFX03SC7721H291.webp"]',
                'preco' => 3220.00,
                'data' => Carbon::parse('2025-04-18 00:00:00'),
                'data_final' => Carbon::parse('2025-04-20 00:00:00'),
                'infos' => 'Mergulhe em uma experiência única na Comunidade Três Unidos, nos dias 18, 19 e 20 de abril.',
                'video' => 'pacote/01J6JE83YEAFF8EK628XJNGYQ9.mp4',
                'pessoas' => 20,
                'dias' => null,
                'comunidade_id' => 2,
                'created_at' => Carbon::parse('2024-08-30 20:04:55'),
                'updated_at' => Carbon::parse('2024-08-30 20:04:55'),
            ]
        ]);
    }
}
