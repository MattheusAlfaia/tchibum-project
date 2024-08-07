<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('home')->insert([

                'id' => 1,
                'titulo_principal' => 'Sua aventura na Amazônia começa agora!',
                'video_principal' => 'home/01HYRASFMWBBYHFS64V042J18P.mp4',
                'titulo_bem_vindo' => 'Viva a Amazônia!  ',
                'descricao_bem_vindo' => 'Experiências autênticas, turismo consciente e conexão profunda com a natureza.\n\nExplore nosso site e descubra as diversas experiências que podemos te oferecer:\n\n*Roteiros personalizados:* Crie sua viagem ideal com a ajuda de nossos especialistas.\n\n*Acomodações confortáveis:* Hospedagem em pousadas charmosas e aconchegantes nas comunidades locais.\n\n*Gastronomia local:* Saboreie pratos típicos da culinária amazônica, preparados com ingredientes frescos e saborosos.\n\nPratique um turismo responsável e contribua para geração de renda e a preservação da Amazônia.\n\nReserve sua aventura na Amazônia agora mesmo!',
                'nome_atividade_comunidade1' => 'EXPERIÊNCIAS ÚNICAS',
                'descricao_atividade_comunidade1' => 'Conecte-se com a cultura local, participe de atividades tradicionais e crie memórias que durarão para sempre.',
                'imagem_atividade_comunidade1' => 'home/01HZ8DT2ATC6QTAJXXX6851E83.jpg',
                'nome_atividade_comunidade2' => 'IMERSÃO AMAZÔNICA',
                'descricao_atividade_comunidade2' => 'Compartilhe conhecimentos e aprenda com a sabedoria ancestral do povo amazônico, criando laços de amizade e respeito mútuo.',
                'imagem_atividade_comunidade2' => 'home/01HZ8DT2AV8C45TPS15ZZQG2EX.jpg',
                'nome_atividade_comunidade3' => 'INTERCÂMBIO EDUCACIONAL',
                'descricao_atividade_comunidade3' => 'Compartilhe conhecimentos e aprenda com a sabedoria ancestral do povo amazônico, criando laços de amizade e respeito mútuo.',
                'imagem_atividade_comunidade3' => 'home/01HZ8DT2AWES0DHC005T65GDXN.jpg',
                'nome_atividade_comunidade4' => 'ATIVIDADES CORPORATIVAS',
                'descricao_atividade_comunidade4' => 'Promova a integração da equipe, o desenvolvimento de valores sociais e a responsabilidade ambiental.',
                'imagem_atividade_comunidade4' => 'home/01HZ8DT2AXJN0HT278WS8KG0AF.jpg',
                'created_at' => '2024-02-05 04:00:21',
                'updated_at' => '2024-06-01 03:07:40'
        ]);

        DB::table('home')->insert([

                'id' => 2,
                'titulo_principal' => 'Your adventure in the Amazon begins now!',
                'video_principal' => 'home/01J1RHQ3HE2VGXHNE49E1CT2CN.mp4',
                'titulo_bem_vindo' => 'Long live the Amazon',
                'descricao_bem_vindo' => 'Authentic experiences, conscious tourism and a deep connection with nature.\n\nExplore our website and discover the different experiences we can offer you:\n\n*Personalized itineraries:* Create your ideal trip with the help of our experts.\n\n*Comfortable accommodation:* Accommodation in charming and cozy inns in local communities.\n\n*Local gastronomy:* Savor typical Amazonian dishes, prepared with fresh and tasty ingredients.\n\nPractice responsible tourism and contribute to generating income and preserving the Amazon.\n\nBook your Amazon adventure now!',
                'nome_atividade_comunidade1' => 'UNIQUE EXPERIENCES',
                'descricao_atividade_comunidade1' => 'Connect with local culture, participate in traditional activities and create memories that will last forever.',
                'imagem_atividade_comunidade1' => 'home/01J1RHQ3JQRVHD0YC6QPZNVBWD.jpg',
                'nome_atividade_comunidade2' => 'IMERSÃO AMAZÔNICA',
                'descricao_atividade_comunidade2' => 'Share knowledge and learn from the ancestral wisdom of the Amazonian people, creating bonds of friendship and mutual respect.',
                'imagem_atividade_comunidade2' => 'home/01J1RHQ3JRCMK2NGWPTHTZPFZD.jpg',
                'nome_atividade_comunidade3' => 'EDUCATIONAL EXCHANGE',
                'descricao_atividade_comunidade3' => 'Share knowledge and learn from the ancestral wisdom of the Amazonian people, creating bonds of friendship and mutual respect.',
                'imagem_atividade_comunidade3' => 'home/01J1RHQ3JSCNYFXSB08XTPZTE9.jpg',
                'nome_atividade_comunidade4' => 'CORPORATE ACTIVITIES',
                'descricao_atividade_comunidade4' => 'Promote team integration, the development of social values ​​and environmental responsibility.',
                'imagem_atividade_comunidade4' => 'home/01J1RHQ3JTRYQPVWFTPNR12K15.jpg',
                'created_at' => '2024-07-02 05:42:29',
                'updated_at' => '2024-07-02 05:42:29'
        ]);

        DB::table('home')->insert([
                'id' => 3,
                'titulo_principal' => '¡Tu aventura en el Amazonas comienza ah',
                'video_principal' => 'home/01J1RJPD5558ZCHADQZFQ0YQCP.mp4',
                'titulo_bem_vindo' => '¡Viva el Amazonas!',
                'descricao_bem_vindo' => 'Experiencias auténticas, turismo consciente y una conexión profunda con la naturaleza.\n\nExplora nuestra web y descubre las diferentes experiencias que podemos ofrecerte:\n\n*Itinerarios personalizados:* Crea tu viaje ideal con la ayuda de nuestros expertos.\n\n*Alojamiento confortable:* Alojamiento en encantadoras y acogedoras posadas en comunidades locales.\n\n*Gastronomía local:* Saboree platos típicos amazónicos, preparados con ingredientes frescos y sabrosos.\n\nPracticar un turismo responsable y contribuir a generar ingresos y preservar la Amazonía.\n\n¡Reserva tu aventura en el Amazonas ahora!',
                'nome_atividade_comunidade1' => 'EXPERIENCIAS ÚNICAS',
                'descricao_atividade_comunidade1' => 'Conéctese con la cultura local, participe en actividades tradicionales y cree recuerdos que durarán para siempre.',
                'imagem_atividade_comunidade1' => 'home/01J1RJPD67PF2R5GWBDK4QQHDX.jpg',
                'nome_atividade_comunidade2' => 'IMERSÃO AMAZÔNICA',
                'descricao_atividade_comunidade2' => 'Compartir conocimientos y aprender de la sabiduría ancestral de los pueblos amazónicos, creando lazos de amistad y respeto mu',
                'imagem_atividade_comunidade2' => 'home/01J1RJPD69XKF5JVGS3Y056XAQ.jpg',
                'nome_atividade_comunidade3' => 'INTERCAMBIO EDUCATIVO',
                'descricao_atividade_comunidade3' => 'Compartir conocimientos y aprender de la sabiduría ancestral de los pueblos amazónicos, creando lazos de amistad y respeto mu',
                'imagem_atividade_comunidade3' => 'home/01J1RJPD6AV3J9K6QFJ4J8SGPA.jpg',
                'nome_atividade_comunidade4' => 'ACTIVIDADES CORPORATIVAS',
                'descricao_atividade_comunidade4' => 'Promover la integración de equipos, el desarrollo de valores sociales y la responsabilidad ambiental.',
                'imagem_atividade_comunidade4' => 'home/01J1RJPD6B60B1Q1MS6228EBPF.jpg',
                'created_at' => '2024-07-02 05:59:35',
                'updated_at' => '2024-07-02 05:59:35'
        ]);

    }
}
