<?php



use App\Models\Home;
use App\Models\Sobre;
use App\Models\Depoimentos;
use App\Models\Posts;

$home = Home::find(1);
$sobre = Home::find(1);
$depoimentos = Depoimentos::all();
$posts = Posts::all();

    
return [

    // home

    'titulo_principal' => $home->titulo_principal, PHP_EOL,
    'pacote_fechado' => 'Pacotes Fechados', PHP_EOL,
    'pacote_personalizado' => 'Pacotes Personalizados', PHP_EOL,
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
    'pacotes' => 'Pacotes' , PHP_EOL,
    'dias_de_tour'=> 'Dias de Tour',
    'comunidades_que_atuamos' => 'COMUNIDADE QUE TRABALHAMOS', PHP_EOL,
    'o_que_oferecemo_de_melhor' => 'O que oferecemos de melhor', PHP_EOL,
    'nossas_atividades' => 'Nossas Atividades', PHP_EOL,
    'momentos' => 'Momentos', PHP_EOL,
    'ler_mais' => 'Ler mais', PHP_EOL,
    'galeria' => 'Galeria', PHP_EOL,


    // sobre
    
    'sobre_nos' => 'Sobre nós', PHP_EOL,
    'sobre_titulo' => $sobre->titulo_principal, PHP_EOL,
    'sobre_texto' => $sobre->sobre , PHP_EOL,
    'sobre' => 'Sobre', PHP_EOL,
    'sobre_descricao_atividade_comunidade1' => $sobre->descricao_atividade_comunidade1, PHP_EOL,
    'sobre_descricao_atividade_comunidade2' => $sobre->descricao_atividade_comunidade2, PHP_EOL,
    'sobre_nome_atividade_comunidade1'=> $sobre->nome_atividade_comunidade1, PHP_EOL,
    'sobre_nome_atividade_comunidade2'=> $sobre->nome_atividade_comunidade2, PHP_EOL,
    'sobre_nome_atividade_comunidade3'=> $sobre->nome_atividade_comunidade3, PHP_EOL,
    'sobre_nome_atividade_comunidade4'=> $sobre->nome_atividade_comunidade4, PHP_EOL,
    'sobre_descricao_atividade_comunidade3' => $sobre->descricao_atividade_comunidade3, PHP_EOL,
    'sobre_descricao_atividade_comunidade4' => $sobre->descricao_atividade_comunidade4, PHP_EOL,
     
   
    //fale conosco 

    'fale_conosco' => 'Fale Conosco', PHP_EOL,
    'orientacao1' => 'Precisa de alguma orientação ou', PHP_EOL,
    'orientacao2' => 'alguma pergunta ? Nós estamos disponíveis', PHP_EOL,
    'whatsapp' => 'CLIQUE AQUI E ENTRE EM CONTATO', PHP_EOL,
    'email' => 'ENTRE EM CONTATO PELO', PHP_EOL,
    'mensagem' => 'Ou escreva sua mensagem aqui', PHP_EOL,
    'nome_cliente' => 'Seu Nome', PHP_EOL,
    'email_cliente' => 'Seu Email', PHP_EOL,
    'assunto_cliente' => 'Assunto', PHP_EOL,
    'mensagem_cliente' => 'Mensagem', PHP_EOL,

    // compras

    'opcoes' => 'Escolha uma Opção', PHP_EOL,

    // pacote fechado

    'comprar' => 'Comprar', PHP_EOL,
    'data' => 'Data', PHP_EOL,
    'data_final' => 'Data Final', PHP_EOL,
    'qauntidade_de_pessoas' => 'Quantidade de Pessoas', PHP_EOL,
    'data_final' => 'Data Final', PHP_EOL,
    'comunidade' => 'Comunidade', PHP_EOL,
    'nome' => 'Nome', PHP_EOL,
    'preco' => 'Preço', PHP_EOL,
    'informacao' => 'Informações', PHP_EOL,
    'informacao_adicional' => 'Informações Adicionais', PHP_EOL,
    'formas_pagamentos' => 'Finalize sua compra', PHP_EOL,
    'e_estrangeiro'=> 'Sou estrangeiro', PHP_EOL,
    'endereco'=> 'Endereço', PHP_EOL,
    'cidade'=> 'Cidade', PHP_EOL,
    'identificacao' => 'Identificação', PHP_EOL,
    'proficao' => 'Profissão', PHP_EOL,
    'nacionalidade' => 'Nacionalidade', PHP_EOL,
    'estado' => 'Estado', PHP_EOL,
    'enviar' => 'Enviar', PHP_EOL,
    

    // pacote personalizado

    'ja_existe_agendamento' => 'Já existe agendamento para essa data', PHP_EOL,
    'data_esta_disponivel'=> ' A data está disponível', PHP_EOL,
    'colidem' => ' Os dias colidem com com outro agendamento', PHP_EOL,
    'conformidade' => 'Os dias estão em coformidade', PHP_EOL,
    'selecionar_comunidade' => 'Selecione a comunidade', PHP_EOL,
    'localidade_e_datas' => 'Localidade e Datas', PHP_EOL,
    'escolha_opcao' => 'Escolha uma opção', PHP_EOL,
    'conhecer_comunidade' => 'Quer conhecer mais as comuniades?', PHP_EOL,
    'verificar_disponibilidade'=> 'Verifique a disponibidade no calendário', PHP_EOL,
    'clique_aqui' => 'Clique Aqui', PHP_EOL,
    'calendario_comunidade' => 'Calendário das Comunidades', PHP_EOL,
    'datas_agendadas'=> 'Datas agendadas', PHP_EOL,
    'dias' => 'Dias', PHP_EOL,
    'pessoas_e_atividades' => 'Pessoas e Atividades', PHP_EOL,
    'quantidade_de_pessoas'=> 'Quantidade de pessoas', PHP_EOL,
    'selecione_as_atividades' => 'Selecione as Atividades', PHP_EOL,
    'clique_no_campo' => 'clique no campo', PHP_EOL,
    'quer_conhecer_mais_as_atividades' => 'Quer conhecer mais as atividades', PHP_EOL,
    'anterior'=> 'Anterior', PHP_EOL,
    'continuar' => 'Continue', PHP_EOL,
    'preencha_o_dados_complementares' => 'Preencha o dados complementares', PHP_EOL,
    'compra_com_tchibum' => 'Realizar a compra com o time da Tchibum', PHP_EOL,

    // layout 
    'quem_somos' => 'QUEM SOMOS', PHP_EOL,
    'noticias' => 'NOTÍCIAS', PHP_EOL,
    'comunidades' => 'COMUNIDADES', PHP_EOL,
    'atividades' => 'ATIVIDADES', PHP_EOL,
    'compras' => 'COMPRAS',
    'fale_conosco_layout' => 'FALE CONOSCO', PHP_EOL,
    'idiomas' => 'IDIOMAS', PHP_EOL,
    'portugues' => 'PORTUGUÊS', PHP_EOL,
    'ingles' => 'INGLÊS', PHP_EOL,
    'espanhol' => 'ESPANHOL', PHP_EOL,
    'entrar' => 'ENTRAR', PHP_EOL,
    'cadastrar' => 'CADASTRAR', PHP_EOL,

    //footer
    'quem_somos_footer'=> 'Quem somos', PHP_EOL,
    'text1' => 'Descubra a Amazônia com a Tchibum, nascida do amor pela região', PHP_EOL,
    'text2' => 'Oferecemos pacotes de turismo que proporcionam uma imersão na riqueza da fauna e flora', PHP_EOL,
    'text3' => 'amazônica, garantindo conforto e segurança aos exploradores', PHP_EOL,
    'informacoes' => 'Informações', PHP_EOL,
    'regulamento_geral' => 'Regulamento Geral', PHP_EOL,
    'condicoes_de_reserva' => 'Condições de Reserva', PHP_EOL,
    'politica_de_privacidade' => 'Política de Privacidade', PHP_EOL,
    'politica_de_reembolso' => 'Política de Privacidade', PHP_EOL,
    'experiencia' => 'Experiência', PHP_EOL,
    'aventura' => 'Aventura', PHP_EOL,
    'hotel_e_restaurantes' => 'Hotel e Restaurantes', PHP_EOL,
    'praias' => 'Praias', PHP_EOL,
    'natureza' => 'Praias', PHP_EOL,
    'acampamentos' => 'Acampamentos', PHP_EOL,
    'festas_regionais' => 'Festas Regionais', PHP_EOL,
    'duvidas' => 'Dudas', PHP_EOL,

    
];




