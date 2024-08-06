<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacotePersonalizado;
use App\Models\PacotePersoUsuario;
use App\Models\User;
use App\Models\Comunidade;
use App\Models\Opcoe;
use App\Models\Contato;
use App\Models\PacotePersoOpcoe;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacotePersonalizados;
use App\Models\Calendar;
use Carbon\Carbon;

class PacksCustomControllers extends Controller
{
    public function index(){

        $comunidades = Comunidade::all();
        $opcoes = Opcoe::all();
        $user = auth()->user();

        $calendar = Calendar::all();
        $datas = [];

        
         foreach ($calendar as $key => $value) {

          
            $startDate = Carbon::parse( $value->start_date);
            $endDate = Carbon::parse($value->end_date);

            $data = [
                'comunidade'=> $value->title,
                'data_inicial'=> (date("d/m/y", strtotime($startDate))),
                'data_final'=> (date("d/m/y", strtotime( $endDate))),
            ];

            array_push($datas,$data);

        
         } 


        return view('packscustoms',compact('comunidades','opcoes','user','datas'));
    }


    public function verificarData(Request $request){

         $calendar = Calendar::all();
      

         $result = true;

   

         foreach ($calendar as $key => $value) {
             if ($request->formData['comunidade'] == $value->title) {
                 $requestData = Carbon::parse($request->formData['data']);
                 $startDate = Carbon::parse($value->start_date);
                 $endDate = Carbon::parse($value->end_date);
         
               
                 // Verificar se a data é igual a start_date ou end_date
                 if ($requestData->eq($startDate) || $requestData->eq($endDate) || $requestData->between($startDate, $endDate)) {
                     $result = false;
                     break; // Se uma correspondência for encontrada, podemos sair do loop imediatamente
                 }
             }
         }
         
         return $result;
    }

    public function verificarDias(Request $request){

        $dataString = $request->formData['data'];

        // Desmembrar a string em ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $dataString);
        
        // Converter para inteiros se necessário
        $ano = (int)$ano;
        $mes = (int)$mes;
        $dia = (int)$dia;

        // Data inicial
        $dataInicial = Carbon::create($ano, $mes, $dia);

        // Número de dias a serem adicionados
        $diasASomar = $request->formData['dias'];

        // Adiciona os dias à data inicial
        $dataFinal = $dataInicial->addDays($diasASomar);


        $calendar = Calendar::all();

        $result = true;

  

        foreach ($calendar as $key => $value) {
            if ($request->formData['comunidade'] == $value->title) {
             
                $startDate = Carbon::parse($value->start_date);
                $endDate = Carbon::parse($value->end_date);
        
                // Verificar se a data é igual a start_date ou end_date
                if ($dataFinal->eq($startDate) || $dataFinal->eq($endDate) ||  $dataFinal->between($startDate, $endDate)) {
                    
                    $result = false;
                    break; // Se uma correspondência for encontrada, podemos sair do loop imediatamente
                }
            }
        }

        
        return $result;


    }


    public function createPacotePerso(Request $request){


        $response = $request->formData;

        $opcoes = [];

        $comunidade = Comunidade::where('nome',$response['comunidade'])->get();

       

        foreach ($response['opcoes'] as $key => $value) {
            array_push($opcoes , Opcoe::where('nome',$value['atividade'])->get());
        }


        $user = auth()->user();

        // Criar Pacote Personalizado

        $pacotepersonalizado = PacotePersonalizado::create([
            'preco' =>  $response['precototal'],
            'data' =>  $response['data'],
            'pessoas' => $response['pessoas'],
            'data_final' => $response['data_final'],
            'comunidade_id' => $comunidade[0]->id,
            'user_id' => $user->id,
        ]);

        

        // Criar Atividades Inclusas
    

        foreach ($opcoes as $key => $value) {

            $pacotepersoopcoe = PacotePersoOpcoe::create([
                'pacoteperso_id' =>  $pacotepersonalizado->id,
                'opcaoperso_id' =>  $value[0]->id,
            ]);
        } 


        // Criar data do Calendário
       
        $dataString = $response['data'];
        $dataFinalString = $response['data_final'];

        // Desmembrar a string em ano, mês e dia
        list($ano, $mes, $dia) = explode('-', $dataString);
        list($ano_final, $mes_final, $dia_final) = explode('-', $dataFinalString);
        
        // Converter para inteiros se necessário
        
        $ano = (int)$ano;
        $mes = (int)$mes;
        $dia = (int)$dia;
        
        $ano_final = (int)$ano_final;
        $mes_final = (int)$mes_final;
        $dia_final = (int)$dia_final;

        // Data inicial
        $dataInicial = Carbon::create($ano, $mes, $dia);

    
        // Data Final
    
        $dataFinal = Carbon::create($ano_final, $mes_final, $dia_final);


         
         $calendar = Calendar::create([
            'title' => $comunidade[0]->nome,
            'comunidade_id' => $comunidade[0]->id,
            'start_date' => $dataInicial,
            'end_date' =>  $dataFinal,
            'color' => '#7a7a7a'
        ]); 

      

        // $this->enviarSolicitacao($pacotepersonalizado->id);

       
        $contato = Contato::find(1);
        $dataFormatada = date("d/m/y", strtotime($pacotepersonalizado->data));
        $dataFinalFormatada = date("d/m/y", strtotime($pacotepersonalizado->data_final));

        $mensagem = "Solicitação de Compra (Pacote Personalizado) :\n\n";
        $mensagem .= "Informações do Pacote:\n\n";
        $mensagem .= "Identificação do Pacote: " . $pacotepersonalizado->id . "\n";
        $mensagem .= "Preço: R$" . $pacotepersonalizado->preco . "\n";
        $mensagem .= "Data: " . $dataFormatada . "\n";
        $mensagem .= "Data Final: " . $dataFinalFormatada . "\n";
        $mensagem .= "Nome da Comunidade: " . $pacotepersonalizado->comunidade->nome . "\n\n";
        $mensagem .= "Informações das Atividades Inclusas: \n\n";
        foreach ($pacotepersonalizado->opcoes as $key => $opcao) {
            $mensagem .= "Atividade: " . $opcao->nome . "\n\n";
        }
        $mensagem .= "Informações do Cliente: \n\n";
        $mensagem .= "Nome: " . $user->name . "\n";
        $mensagem .= "Email: " . $user->email . "\n";

           // Montar o link do WhatsApp
        $linkWhatsApp = "https://wa.me/" . $contato->whatsapp. "/?text=" . rawurlencode($mensagem);

           // Redirecionar para o link do WhatsApp
        return $linkWhatsApp;

    }



    protected function enviarSolicitacao($pacotepersonalizado){


       $pacote = PacotePersonalizado::with('comunidade','opcoes')->find($pacotepersonalizado);
 

       $user = auth()->user();


        $email_tchibum = 'tchibumnaamazonia@gmail.com';

        $mail = Mail::to([$user->email,$email_tchibum])->send(new PacotePersonalizados([
            'pacote'=> $pacote,
            'user'=> $user,
        ]));
    }

     public function AprovarSolicitacao(PacotePersonalizado $pacotepersonalizado){

        $pacotepersonalizado->status = 'APROVADO';
        $pacotepersonalizado->save();

        $user = auth()->user();

        //Criar Compras

        $pacotepersousuario = PacotePersoUsuario::create([
            'pacoteperso_id' =>  $pacotepersonalizado->id,
            'user_id' => $user->id ,
            'data' => date('Y-m-d H:i:s')
        ]);

        return redirect('/admin/pacote-personalizados');
     }

     public function ReprovarSolicitacao(PacotePersonalizado $pacotepersonalizado){

        $pacotepersonalizado->status = 'REPROVADO';
        $pacotepersonalizado->save();

        return redirect('/admin/pacote-personalizados');
     }
}
