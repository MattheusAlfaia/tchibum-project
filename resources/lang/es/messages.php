<?php

use App\Models\Home;
use App\Models\Depoimentos;
use App\Models\Sobre;
use App\Models\Posts;

$home = Home::find(3);
$sobre = Sobre::find(3);
$posts = Posts::all();


return [
    // home
    'titulo_principal' => $home->titulo_principal ,PHP_EOL,
    'pacote_fechado' => 'Paquetes cerrados', PHP_EOL,
    'pacote_personalizado' => 'Paquetes Personalizados', PHP_EOL,
    'titulo_bem_vindo' => $home->titulo_bem_vindo, PHP_EOL,
    'descricao_bem_vindo' => $home->descricao_bem_vindo . PHP_EOL,
    'home_descricao_atividade_comunidade1' => $home->descricao_atividade_comunidade1 . PHP_EOL,
    'home_descricao_atividade_comunidade2' => $home->descricao_atividade_comunidade2 . PHP_EOL,
    'home_nome_atividade_comunidade1'=> $home->nome_atividade_comunidade1, PHP_EOL,
    'home_nome_atividade_comunidade2'=> $home->nome_atividade_comunidade2, PHP_EOL,
    'home_nome_atividade_comunidade3'=> $home->nome_atividade_comunidade3, PHP_EOL,
    'home_nome_atividade_comunidade4'=> $home->nome_atividade_comunidade4, PHP_EOL,
    'home_descricao_atividade_comunidade3' => $home->descricao_atividade_comunidade3 . PHP_EOL,
    'home_descricao_atividade_comunidade4' => $home->descricao_atividade_comunidade4 . PHP_EOL,
    'pacotes' => 'Paquetes' . PHP_EOL,
    'comunidades_que_atuamos' => 'COMUNIDADES TRABAJAMOS' . PHP_EOL,
    'o_que_oferecemo_de_melhor' => 'Lo que mejor ofrecemos' . PHP_EOL,
    'nossas_atividades' => 'Nuestras actividades' . PHP_EOL,
    'momentos' => 'Momentos' . PHP_EOL,
    'ler_mais' => 'Leer más' . PHP_EOL,
    'galeria' => 'Galería' . PHP_EOL,

    // sobre
    'sobre_nos' => 'Sobre nosotros' . PHP_EOL,
    'sobre_titulo' => $sobre->titulo_principal , PHP_EOL,
    'sobre_texto' => $sobre->sobre , PHP_EOL,
    'sobre' => 'Acerca de' , PHP_EOL,
    'sobre_descricao_atividade_comunidade1' => $sobre->descricao_atividade_comunidade1 . PHP_EOL,
    'sobre_descricao_atividade_comunidade2' => $sobre->descricao_atividade_comunidade2 . PHP_EOL,
    'sobre_nome_atividade_comunidade1'=> $sobre->nome_atividade_comunidade1, PHP_EOL,
    'sobre_nome_atividade_comunidade2'=> $sobre->nome_atividade_comunidade2, PHP_EOL,
    'sobre_nome_atividade_comunidade3'=> $sobre->nome_atividade_comunidade3, PHP_EOL,
    'sobre_nome_atividade_comunidade4'=> $sobre->nome_atividade_comunidade4, PHP_EOL,
    'sobre_descricao_atividade_comunidade3' => $sobre->descricao_atividade_comunidade3 . PHP_EOL,
    'sobre_descricao_atividade_comunidade4' => $sobre->descricao_atividade_comunidade4 . PHP_EOL,

    //fale conosco 

    'fale_conosco' => 'Fale Conosco', PHP_EOL,
    'orientacao1' => 'Precisa de alguna orientación o', PHP_EOL,
    'orientacao2' => 'Alguna pregunta ? Estamos disponibles', PHP_EOL,
    'whatsapp' => 'HAGA CLIC AQUÍ Y PONTE EN CONTACTO', PHP_EOL,
    'email' => 'PONTE EN CONTACTO EN', PHP_EOL,
    'mensagem' => 'O escribe tu mensaje aquí', PHP_EOL,
    'nome_cliente' => 'Su nombre', PHP_EOL,
    'email_cliente' => 'Tu correo electrónico', PHP_EOL,
    'assunto_cliente' => 'Sujeta', PHP_EOL,
    'mensagem_cliente' => 'Mensaje', PHP_EOL,

    // compras

    'opcoes' => 'Elige una opcion', PHP_EOL,

    // pacote fechado

    'comprar' => 'Compra', PHP_EOL,
    'data' => 'Fecha', PHP_EOL,
    'qauntidade_de_pessoas' => 'Cantidad de personas', PHP_EOL,
    'qauntidade_de_dias' => 'Número de días', PHP_EOL,
    'comunidade' => 'Comunidad', PHP_EOL,
    'nome' => 'Nombre', PHP_EOL,
    'preco' => 'Precio', PHP_EOL,
    'informacao' => 'Información', PHP_EOL,
    'informacao_adicional' => 'Informaciones adicionales', PHP_EOL,
    'formas_pagamentos' => 'Completa tu compra', PHP_EOL,
    'e_estrangeiro'=> 'Soy extranjero', PHP_EOL,
    'endereco'=> 'Dirección', PHP_EOL,
    'cidade'=> 'Ciudad', PHP_EOL,
    'identificacao' => 'Identificación', PHP_EOL,
    'proficao' => 'Profesión', PHP_EOL,
    'nacionalidade' => 'Nacionalidad', PHP_EOL,
    'estado' => 'Estado', PHP_EOL,
    'enviar' => 'Mandar', PHP_EOL,

    // pacote personalizado

    'ja_existe_agendamento' => 'Ya hay agenda para esa fecha', PHP_EOL,
    'data_esta_disponivel'=> 'La fecha esta disponible', PHP_EOL,
    'colidem' => 'Los días chocan con otro horario', PHP_EOL,
    'conformidade' => 'Los días están conformes', PHP_EOL,

    'selecionar_comunidade' => 'Selecciona la comunidad', PHP_EOL,
    'localidade_e_datas' => 'Ubicación y fechas', PHP_EOL,
    'escolha_opcao' => 'Elige una opcion', PHP_EOL,
    'conhecer_comunidade' => '¿Quieres saber más sobre las comunidades?', PHP_EOL,
    'verificar_disponibilidade'=> 'Consulta disponibilidad en el calendario', PHP_EOL,
    'clique_aqui' => 'Haga clic aquí', PHP_EOL,
    'calendario_comunidade' => 'Calendario de comunidades', PHP_EOL,
    'datas_agendadas'=> 'Fechas programadas', PHP_EOL,
    'dias' => 'Días', PHP_EOL,
    'pessoas_e_atividades' => 'Personas y actividades', PHP_EOL,
    'quantidade_de_pessoas'=> 'Cantidad de personas', PHP_EOL,
    'selecione_as_atividades' => 'Seleccionar actividades', PHP_EOL,
    'clique_no_campo' => 'haga clic en el campo', PHP_EOL,
    'quer_conhecer_mais_as_atividades' => '¿Quieres saber más sobre las actividades?', PHP_EOL,
    'anterior'=> 'Anterior', PHP_EOL,
    'continuar' => 'Continuar', PHP_EOL,
    'preencha_o_dados_complementares' => 'Complete los datos adicionales', PHP_EOL,
    'compra_com_tchibum' => "Realiza la compra con el tiempo de Tchibum.", PHP_EOL,

    
    // layout 
    'quem_somos' => 'SOBRE NOSOTRAS', PHP_EOL,
    'noticias' => 'Noticias', PHP_EOL,
    'comunidades' => 'COMUNIDADES', PHP_EOL,
    'atividades' => 'ACTIVIDADES', PHP_EOL,
    'compras' => 'COMPRAS',
    'fale_conosco_layout' => 'CONTÁCTENOS', PHP_EOL,
    'idiomas' => 'IDIOMAS', PHP_EOL,
    'portugues' => 'PORTUGUESA', PHP_EOL,
    'ingles' => 'INGLESA', PHP_EOL,
    'espanhol' => 'ESPAÑOLA', PHP_EOL,
    'entrar' => 'ACCESO', PHP_EOL,
    'cadastrar' => 'REGISTRO', PHP_EOL,
    
    
         //footer
         'quem_somos_footer'=> 'Quienes somos', PHP_EOL,
         'text1' => 'Descubre el Amazonas con Tchibum, nacido del amor por la región', PHP_EOL,
         'text2' => 'Ofrecemos paquetes turísticos que brindan una inmersión en la riqueza de fauna y flora', PHP_EOL,
         'text3' => 'Amazon, garantizando comodidad y seguridad a los exploradores', PHP_EOL,
         'informacoes' => 'Información', PHP_EOL,
         'regulamento_geral' => 'Reglamento General', PHP_EOL,
         'condicoes_de_reserva' => 'Condiciones de reserva', PHP_EOL,
         'politica_de_privacidade' => 'Política de privacidad', PHP_EOL,
         'politica_de_reembolso' => 'Politica de reembolso', PHP_EOL,
         'experiencia' => 'Experiencia', PHP_EOL,
         'aventura' => 'Aventura', PHP_EOL,
         'hotel_e_restaurantes' => 'Hoteles y Restaurantes', PHP_EOL,
         'praias' => 'Playas', PHP_EOL,
         'natureza' => 'Naturaleza', PHP_EOL,
         'acampamentos' => 'Campamentos', PHP_EOL,
         'festas_regionais' => 'Festivales Regionales', PHP_EOL,
         'duvidas' => 'Doubts', PHP_EOL,


];



