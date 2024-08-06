<?php

use App\Models\Home;
use App\Models\Depoimentos;
use App\Models\Sobre;
use App\Models\Posts;
use Statickidz\GoogleTranslate;

$tr = new GoogleTranslate();


$home = Home::find(2);
$sobre = Sobre::find(2);
$posts = Posts::all();


return [
    // home

    'titulo_principal' => $home->titulo_principal, PHP_EOL,
    'pacote_fechado' => 'Closed Packages', PHP_EOL,
    'pacote_personalizado' => 'Customized Packages', PHP_EOL,
    'titulo_bem_vindo' => $home->titulo_bem_vindo, PHP_EOL,
    'descricao_bem_vindo' => $home->descricao_bem_vindo, PHP_EOL,
    'home_descricao_atividade_comunidade1' => $home->descricao_atividade_comunidade1, PHP_EOL,
    'home_descricao_atividade_comunidade2' => $home->descricao_atividade_comunidade2, PHP_EOL,
    'home_nome_atividade_comunidade1'=> $home->nome_atividade_comunidade1, PHP_EOL,
    'home_nome_atividade_comunidade2'=> $home->nome_atividade_comunidade2, PHP_EOL,
    'home_nome_atividade_comunidade3'=> $home->nome_atividade_comunidade3, PHP_EOL,
    'home_nome_atividade_comunidade4'=> $home->nome_atividade_comunidade4, PHP_EOL,
    'home_descricao_atividade_comunidade3' => $home->descricao_atividade_comunidade3, PHP_EOL,
    'home_descricao_atividade_comunidade4' => $home->descricao_atividade_comunidade4, PHP_EOL,
    'pacotes' => 'Packages' , PHP_EOL,
    'dias_de_tour'=> 'Tour days',
    'comunidades_que_atuamos' => 'COMMUNITIES WE WORK', PHP_EOL,
    'o_que_oferecemo_de_melhor' => 'What we offer best', PHP_EOL,
    'nossas_atividades' => 'Our Activities', PHP_EOL,
    'momentos' => 'Moments', PHP_EOL,
    'ler_mais' => 'Read more', PHP_EOL,
    'galeria' => 'Gallery', PHP_EOL,
  
    // sobre
    
    'sobre_nos' => 'About us', PHP_EOL,
    'sobre_titulo' => $sobre->titulo_principal, PHP_EOL,
    'sobre_texto' => $sobre->sobre, PHP_EOL,
    'sobre' => 'About us', PHP_EOL,
    'sobre_descricao_atividade_comunidade1' => $sobre->descricao_atividade_comunidade1, PHP_EOL,
    'sobre_descricao_atividade_comunidade2' => $sobre->descricao_atividade_comunidade2, PHP_EOL,
    'sobre_nome_atividade_comunidade1'=> $sobre->nome_atividade_comunidade1, PHP_EOL,
    'sobre_nome_atividade_comunidade2'=> $sobre->nome_atividade_comunidade2, PHP_EOL,
    'sobre_nome_atividade_comunidade3'=> $sobre->nome_atividade_comunidade3, PHP_EOL,
    'sobre_nome_atividade_comunidade4'=> $sobre->nome_atividade_comunidade4, PHP_EOL,
    'sobre_descricao_atividade_comunidade3' => $sobre->descricao_atividade_comunidade3, PHP_EOL,
    'sobre_descricao_atividade_comunidade4' => $sobre->descricao_atividade_comunidade4, PHP_EOL,

    //fale conosco 

    'fale_conosco' => 'Contact Us', PHP_EOL,
    'orientacao1' => 'Need guidance or', PHP_EOL,
    'orientacao2' => 'any question? We are available', PHP_EOL,
    'whatsapp' => 'CLICK HERE AND CONTACT US BY WHATSAPP', PHP_EOL,
    'email' => 'CONTACT US BY EMAIL', PHP_EOL,
    'mensagem' => 'Or write your message here', PHP_EOL,
    'nome_cliente' => 'Your Name', PHP_EOL,
    'email_cliente' => 'Your Email', PHP_EOL,
    'assunto_cliente' => 'Subject', PHP_EOL,
    'mensagem_cliente' => 'Message', PHP_EOL,

    // compras

    'opcoes' => 'Choose an Option', PHP_EOL,


     // pacote fechado

     'comprar' => 'Purchase', PHP_EOL,
     'data' => 'Date', PHP_EOL,
     'qauntidade_de_pessoas' => 'Amount of people', PHP_EOL,
     'qauntidade_de_dias' => 'Number of days', PHP_EOL,
     'comunidade' => 'Community', PHP_EOL,
     'nome' => 'Name', PHP_EOL,
     'preco' => 'Price', PHP_EOL,
     'informacao' => 'Information', PHP_EOL,
     'informacao_adicional' => 'Additional Information', PHP_EOL,
     'formas_pagamentos' => 'Complete your purchase', PHP_EOL,
     'e_estrangeiro'=> 'I am a foreigner', PHP_EOL, 
     'endereco'=> 'Address', PHP_EOL,
     'cidade'=> 'City', PHP_EOL,
     'identificacao' => 'Identification', PHP_EOL,
     'proficao' => 'Profession', PHP_EOL,
     'nacionalidade' => 'Nationality', PHP_EOL,
     'estado' => 'State', PHP_EOL,
     'enviar' => 'Submit', PHP_EOL,

    // pacote personalizado

    'ja_existe_agendamento' => 'There is already a schedule for that date', PHP_EOL,
    'data_esta_disponivel'=> 'The date is available', PHP_EOL,
    'colidem' => 'Days collide with another schedule', PHP_EOL,
    'conformidade' => 'The days are in conformity', PHP_EOL,
    'selecionar_comunidade' => 'Select the community', PHP_EOL,
    'localidade_e_datas' => 'Location and Dates', PHP_EOL,
    'escolha_opcao' => 'Choose an option', PHP_EOL,
    'conhecer_comunidade' => 'Do you want to know more about the communities?', PHP_EOL,
    'verificar_disponibilidade'=> 'Check availability on the calendar', PHP_EOL,
    'clique_aqui' => 'Click here', PHP_EOL,
    'calendario_comunidade' => 'Communities Calendar', PHP_EOL,
    'datas_agendadas'=> 'Scheduled dates', PHP_EOL,
    'dias' => 'Days', PHP_EOL,
    'continuar' => 'Continue', PHP_EOL,
    'pessoas_e_atividades' => 'People and Activities', PHP_EOL,
    'quantidade_de_pessoas'=> 'Amount of people', PHP_EOL,
    'selecione_as_atividades' => 'Select Activities', PHP_EOL,
    'clique_no_campo' => 'click on the field', PHP_EOL,
    'quer_conhecer_mais_as_atividades' => 'Want to know more about the activities', PHP_EOL,
    'anterior'=> 'Previous', PHP_EOL,
    'preencha_o_dados_complementares' => 'Fill in the additional data', PHP_EOL,
    'compra_com_tchibum' => "Make the purchase with Tchibum's time", PHP_EOL,

    // layout 
    'quem_somos' => 'ABOUT US', PHP_EOL,
    'noticias' => 'NEWS', PHP_EOL,
    'comunidades' => 'COMMUNITIES', PHP_EOL,
    'atividades' => 'ACTIVITIES', PHP_EOL,
    'compras' => 'COMPRAS',
    'fale_conosco_layout' => 'CONTACT US', PHP_EOL,
    'idiomas' => 'LANGUAGES', PHP_EOL,
    'portugues' => 'PORTUGUESE', PHP_EOL,
    'ingles' => 'ENGLISH', PHP_EOL,
    'espanhol' => 'SPANISH', PHP_EOL,
    'entrar' => 'LOGIN', PHP_EOL,
    'cadastrar' => 'REGISTER', PHP_EOL,


     //footer
     'quem_somos_footer'=> 'Who we are', PHP_EOL,
     'text1' => 'Discover the Amazon with Tchibum, born from love for the region', PHP_EOL,
     'text2' => 'We offer tourism packages that provide an immersion in the richness of fauna and flora', PHP_EOL,
     'text3' => 'Amazon, ensuring comfort and safety for explorers', PHP_EOL,
     'informacoes' => 'Information', PHP_EOL,
     'regulamento_geral' => 'General Regulation', PHP_EOL,
     'condicoes_de_reserva' => 'Booking Conditions', PHP_EOL,
     'politica_de_privacidade' => 'Privacy Policy', PHP_EOL,
     'politica_de_reembolso' => 'Refund Policy', PHP_EOL,
     'experiencia' => 'Experience', PHP_EOL,
     'aventura' => 'Adventure', PHP_EOL,
     'hotel_e_restaurantes' => 'Hotel and Restaurants', PHP_EOL,
     'praias' => 'Beaches', PHP_EOL,
     'natureza' => 'Nature', PHP_EOL,
     'acampamentos' => 'Camps', PHP_EOL,
     'festas_regionais' => 'Regional Festivals', PHP_EOL,
     'duvidas' => 'Dúvidas', PHP_EOL,


];

// GOOGLE TRANSLATE

  // https://github.com/statickidz/php-google-translate-free/issues/38

  /*   'post_titulo' => array_map(function ($post) use ($tr) {
        return $tr->translate('pt', 'en', $post['titulo']);
    }, $posts->toArray()),

    'post_descricao' => array_map(function ($post) use ($tr) {
        return $tr->translate('pt', 'en', $post['descricao']);
    }, $posts->toArray()),
    */



