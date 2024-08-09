<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Pacote;
use App\Models\User;
use App\Models\PacoteUsuario;
use App\Models\PacotePersonalizado;
use Illuminate\Support\Facades\Mail;
use App\Mail\PacoteUsuarios;
use App\Models\Contato;
use App\Models\Comunidade;
use App\Models\Opcoe;
use App\Models\PacotePersoOpcoe;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PacoteSaveRequest;
use App\Http\Requests\PacoteSelectRequest;


use App\Http\Requests\ComunidadeRequest;

class PacksController extends Controller
{
    public function show()
    {
        $comunidades = Comunidade::has('pacotes')->get();

        return view('pacoteSteps/stepSelect', compact('comunidades'));
    }

    public function comunidadeInfo(ComunidadeRequest $request)
    {
        $id_comunidade = $request->comunidade_id;

        $comunidade = Cache::remember("comunidade_{$id_comunidade}_with_pacotes", 8 * 60, function () use ($id_comunidade) {
            return Comunidade::with('pacotes')->find($id_comunidade);
        });

        return view('pacoteSteps.comunidadeInfo', compact('comunidade'));
    }


    public function pacoteSelect(Request $request)
    {
        $id_comunidade = $request->comunidade_id;

        $comunidade = Comunidade::with('pacotes')->find($id_comunidade);
        $atividades = Opcoe::where('comunidade_id', $id_comunidade)->get();

        return view('pacoteSteps.stepFinal', compact('atividades', 'comunidade'));
    }


    // /// /// /// /// /// /// /// /// /// /// /// /// /// ///



    public function save(Request $request)
    {
        $precoTotal = 0;

        if ($request->has('atividades')) {
            $atividades = Opcoe::whereIn('id', $request->atividades)->get();
            foreach ($atividades as $atividade) {
                $precoTotal += $atividade->preco * $request->pessoas;
            }
        }

        $pacotePersonalizado = PacotePersonalizado::create([
            'comunidade_id' => $request->comunidade_id,
            'user_id' => auth()->id(),
            'preco' => $precoTotal,
            'data' => $request->data,
            'data_final' => $request->data_final,
            'pessoas' => $request->pessoas,
            'status' => 'EM ANALISE',
        ]);

        if ($request->has('atividades')) {
            $pacotePersonalizado->opcoes()->attach($request->atividades);
        }

        $whatsappLink = $this->generateWhatsAppLink($pacotePersonalizado);

        return redirect()->away($whatsappLink);
    }


    private function generateWhatsAppLink(PacotePersonalizado $pacote)
    {
        $contato = Contato::findOrFail(1);

        $dataFormatada = \Carbon\Carbon::parse($pacote->data)->format('d/m/Y');
        $dataFinalFormatada = \Carbon\Carbon::parse($pacote->data_final)->format('d/m/Y');

        $user = auth()->user();

        $mensagem = "Solicitação de Compra (Pacote Personalizado) :\n\n";
        $mensagem .= "Informações do Pacote:\n\n";
        $mensagem .= "Identificação do Pacote: " . $pacote->id . "\n";
        $mensagem .= "Preço: R$" . number_format($pacote->preco, 2, ',', '.') . "\n";
        $mensagem .= "Data: " . $dataFormatada . "\n";
        $mensagem .= "Data Final: " . $dataFinalFormatada . "\n";
        $mensagem .= "Nome da Comunidade: " . $pacote->comunidade->nome . "\n\n";
        $mensagem .= "Informações das Atividades Inclusas: \n\n";
        foreach ($pacote->opcoes as $opcao) {
            $mensagem .= "Atividade: " . $opcao->nome . "\n\n";
        }
        $mensagem .= "Informações do Cliente: \n\n";
        $mensagem .= "Nome: " . $user->name . "\n";
        $mensagem .= "Email: " . $user->email . "\n";

        return "https://wa.me/" . $contato->whatsapp . "/?text=" . rawurlencode($mensagem);
    }





    public function index(){
        $pacotes = Pacote::with('comunidade')->latest()->paginate(6);

        return view('packs',compact('pacotes'));
    }

    public function pack(Pacote $pacote){

        $pacote = $pacote::with('comunidade','opcoes')->find( $pacote->id);


        return view('pack',compact('pacote'));
    }


    protected function enviarSolicitacao($pacote){


        $pacote = Pacote::with('comunidade','opcoes')->find($pacote);

        $user = auth()->user();

         $email_tchibum = 'tchibumnaamazonia@gmail.com';

         $mail = Mail::to([$user->email,$email_tchibum])->send(new PacoteUsuarios([
             'pacote'=> $pacote,
             'user'=> $user,
         ]));



     }


    public function addDadosComple(Request $request, User $user){

        $user->cpf =  $request->cpf;
        $user->uf =  $request->uf;
        $user->endereco =  $request->endereco;
        $user->cep =  $request->cep;
        $user->cidade =  $request->cidade;
        $user->identificacao =  $request->identificacao;
        $user->proficao =  $request->proficao;
        $user->nacionalidade =  $request->nacionalidade;
        $user->estado =  $request->estado;

        $user->save();


       return 'Seus dados foram enviados clique em Comprar Novamente';

    }
}
