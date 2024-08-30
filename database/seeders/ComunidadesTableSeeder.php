<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ComunidadesTableSeeder extends Seeder
{
    //php artisan db:seed --class=ComunidadesTableSeeder
    public function run()
    {
        DB::table('comunidades')->insert([
            [
                'id' => 2,
                'nome' => 'Comunidade Indígena Três Unidos',
                'titulo' => 'Aldeia dos Povos Kambeba',
                'descricao' => 'Mergulhe na rica cultura Kambeba, um povo ancestral que habita as margens do exuberante Rio Cuieiras. Localizada a apenas 1h30 de lancha de Manaus, essa comunidade guarda um tesouro de tradições e conhecimentos ancestrais. As mulheres Kambeba são mestras da culinária e da arte, produzindo pratos deliciosos e peças de artesanato únicas no restaurante comunitário Sumimi. A comunidade está localizada dentro da Reserva de Desenvolvimento Sustentável (RDS) Puranga Conquista, um refúgio de biodiversidade que garante a proteção dos recursos naturais e promove o desenvolvimento sustentável da região. Venha conhecer a Comunidade Indígena Três Unidos e vivenciar uma experiência inesquecível!',
                'latitude' => null,
                'longitude' => null,
                'endereço' => '-2.820696043342341, -60.502992760294624',
                'imagem_principal' => 'comunidades/01J6B6XFVX9YQE003MN3YCHRJX.jpg',
                'imagens_secundarias' => '["comunidades\\/01J6922PTA6R8YGEFCKRVV0TNG.jfif"]',
                'video' => 'comunidades/01J6922PTC2MRPVNPEZPV8H7FY.mp4',
                'created_at' => Carbon::parse('2024-08-27 04:39:05'),
                'updated_at' => Carbon::parse('2024-08-29 01:47:20'),
            ],
            [
                'id' => 3,
                'nome' => 'Comunidade Indígena Nova Esperança',
                'titulo' => 'Uma Imersão na Cultura Baré na Amazônia',
                'descricao' => 'A Comunidade Indígena Nova Esperança, localizada na Reserva de Desenvolvimento Sustentável Puranga Conquista, em Manaus, te convida a uma experiência única. Mergulhe na cultura Baré e vivencie a rotina de uma comunidade tradicional amazônida. Hospedagem Aconchegante A comunidade oferece a oportunidade de se hospedar em casas de moradores locais. Desfrute de um café da manhã caseiro e tenha contato direto com a natureza às margens do Rio Cuieiras. Sabores da Floresta Saboreie a culinária regional no restaurante comunitário, com pratos à base de peixes frescos, como tambaqui e matrinxã, preparados em moquém, um método tradicional de cozimento indígena. Artesanato Único Admire e adquira peças de artesanato únicas, produzidas com madeira de resíduos florestais e outras fibras naturais. A marchetaria, técnica que utiliza diferentes tipos de madeira para criar desenhos intrincados, é um destaque.',
                'latitude' => null,
                'longitude' => null,
                'endereço' => 'Comunidade Indígena Nova Esperança  Manaus – Amazonas/AM  CEP 69049-993',
                'imagem_principal' => 'comunidades/01J6B8AFJDZXYA9FHZBPB76E7D.jpeg',
                'imagens_secundarias' => '["comunidades\\/01J6B8AFJF6VA8F1NFZRMVM9AX.jpeg"]',
                'video' => 'comunidades/01J6B8AFJH1EM9XZM8J05KWW5G.jpeg',
                'created_at' => Carbon::parse('2024-08-28 01:06:40'),
                'updated_at' => Carbon::parse('2024-08-28 01:06:40'),
            ],
            [
                'id' => 4,
                'nome' => 'Comunidade Ribeirinha Agrovila',
                'titulo' => 'Berço da Cerâmica Amazônica em Manaus',
                'descricao' => 'A apenas 40 minutos de Manaus, a Comunidade Agrovila, situada às margens do Tarumã-Mirim, convida você a uma imersão na rica história e cultura da cerâmica amazônica, em meio à exuberante natureza da região. Um mergulho no passado: No coração da comunidade, o Museu da Cerâmica se destaca como um portal para o passado, revelando a arte e a técnica milenar da cerâmica por meio de peças que remontam a diferentes épocas e culturas. Uma verdadeira viagem no tempo, que permite apreciar a beleza e a complexidade das criações dos povos indígenas e ribeirinhos que habitaram a região. Após a visita ao museu, refresque-se nas águas do Tarumã-Mirim. Um mergulho revigorante é a pedida ideal para os dias quentes, proporcionando momentos de relaxamento e contato com a natureza. A Comunidade Agrovila oferece uma experiência completa para quem busca história, cultura e contato com a natureza. Além do museu e do banho de rio, você poderá desfrutar da culinária local, com pratos típicos da região, e interagir com os moradores, conhecendo de perto o modo de vida ribeirinho. A Comunidade Agrovila espera por você de braços abertos. Venha nos visitar.',
                'latitude' => null,
                'longitude' => null,
                'endereço' => 'Agrovila',
                'imagem_principal' => 'comunidades/01J6DWYQ7MXGCBV55BFBKV4GE5.jpg',
                'imagens_secundarias' => '["comunidades\\/01J6DWYQ7PQABC10579FFE3505.webp"]',
                'video' => 'comunidades/01J6DWYQ7PQABC10579FFE3507.webp',
                'created_at' => Carbon::parse('2024-08-29 01:45:43'),
                'updated_at' => Carbon::parse('2024-08-29 01:45:43'),
            ],
            [
                'id' => 5,
                'nome' => 'Comunidade Ribeirinha do Livramento',
                'titulo' => 'Comunidade Nossa Senhora do Livramento',
                'descricao' => 'A comunidade Nossa Senhora do Livramento, localizada a cerca de 10 Km de Manaus, é um exemplo de resistência e adaptação. Fundada em 1973, a comunidade abriga mais de 140 famílias de diversas etnias indígenas, como Baré, Mura, Tukano e outras, que migraram da região do Alto Rio Negro e Médio Solimões em busca de melhores oportunidades. A chegada de Silvano Thomás, indígena Baré, em 1983, foi um marco importante para a comunidade. Como professor e guardião da língua Nheengatu, ele contribuiu para fortalecer a identidade cultural e a união entre os diferentes povos que ali viviam. A palavra de ordem na comunidade sempre foi a união, demonstrando a força da cultura indígena e sua capacidade de se adaptar a novos contextos.',
                'latitude' => null,
                'longitude' => null,
                'endereço' => 'Livramento',
                'imagem_principal' => 'comunidades/01J6DXSDJDF7Z59RDAZ9AN2NXZ.jpeg',
                'imagens_secundarias' => '["comunidades\\/01J6DXSDJEMM8TJFKX7MQNY4N4.jpeg"]',
                'video' => 'comunidades/01J6DXSDJGWP2P44QQ3E3CTZEX.jpeg',
                'created_at' => Carbon::parse('2024-08-29 02:00:18'),
                'updated_at' => Carbon::parse('2024-08-29 02:00:18'),
            ]
        ]);
    }
}
