<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Pacote;
use App\Models\User;
use App\Models\PacoteUsuario;
use App\Models\PacotePersonalizado;
use App\Models\PacotePersoUsuario;
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
        // apena se tiver logado se não vai para login
        if (!auth()->check()) {
            return redirect()->route('login');
        }
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

        // Cálculo do preço total das atividades multiplicado pelo número de pessoas
        if ($request->has('atividades')) {
            $atividades = Opcoe::whereIn('id', $request->atividades)->get();
            foreach ($atividades as $atividade) {
                $precoTotal += $atividade->preco * $request->pessoas;
            }
        }

        // Adiciona a taxa da comunidade ao preço total
        $comunidade = Comunidade::find($request->comunidade_id);
        $precoTotal += $comunidade->taxa;

        // Criação do pacote personalizado
        $pacotePersonalizado = PacotePersonalizado::create([
            'comunidade_id' => $request->comunidade_id,
            'user_id' => auth()->id(),
            'preco' => $precoTotal,
            'data' => $request->data,
            'data_final' => $request->data_final,
            'pessoas' => $request->pessoas,
            'status' => 'EM ANALISE',
        ]);

        PacotePersoUsuario::create([
            'pacoteperso_id' => $pacotePersonalizado->id,
            'user_id' => auth()->id(),
            'data' => $pacotePersonalizado->data,
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

        $taxaTransporte = number_format($pacote->comunidade->taxa, 2, ',', '.');

        $mensagem = "Solicitação de Compra (Pacote Personalizado) :\n\n";
        $mensagem .= "Informações do Pacote:\n\n";
        $mensagem .= "Identificação do Pacote: " . $pacote->id . "\n";
        $mensagem .= "Preço Total: R$" . number_format($pacote->preco, 2, ',', '.') . "\n";
        $mensagem .= "Taxa de Transporte: R$" . $taxaTransporte . "\n";
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

    public function solicitacaoCompraPkFechado(Pacote $pacote){

        $pacote = $pacote::with('comunidade','opcoes')->find( $pacote->id);

        PacoteUsuario::create([
            'pacote_id' => $pacote->id,
            'user_id' => auth()->user()->id,
            'data' => date("Y-m-d H:i:s"),
        ]);


        // $this->enviarSolicitacao($pacote->id);
        $contato = Contato::find(1);

        $dataFormatada = date("d/m/y", strtotime($pacote->data));
        $dataFinalFormatada = date("d/m/y", strtotime($pacote->data_final));
        $user = auth()->user();

        $mensagem = "Solicitação de Compra (Pacote Fechado) :\n\n";
        $mensagem .= "Informações do Pacote:\n\n";
        $mensagem .= "Identificação do Pacote: " . $pacote->id . "\n";
        $mensagem .= "Nome do Pacote: " . $pacote->nome . "\n";
        $mensagem .= "Preço: R$" . $pacote->preco . "\n";
        $mensagem .= "Data: " . $dataFormatada . "\n";
        $mensagem .= "Data Final: " . $dataFinalFormatada . "\n";
        $mensagem .= "Nome da Comunidade: " . $pacote->comunidade->nome . "\n\n";
        $mensagem .= "Informações das Atividades Inclusas: \n\n";
        foreach ($pacote->opcoes as $key => $opcao) {
            $mensagem .= "Atividade: " . $opcao->nome . ",\n\n";
        }
        $mensagem .= "Informações do Cliente: \n\n";
        $mensagem .= "Nome: " . $user->name . ",\n";
        $mensagem .= "Email: " . $user->email . "\n";

           // Montar o link do WhatsApp
        $linkWhatsApp = "https://wa.me/" . $contato->whatsapp. "/?text=" . rawurlencode($mensagem);

           // Redirecionar para o link do WhatsAp
        // return redirect()->away($linkWhatsApp);
        return $linkWhatsApp;

    }

    public function addDadosComple(Request $request)
    {
        // Obtemos o usuário com base no ID fornecido na requisição
        $user = User::find($request->user);

        if (!$user) {
            return response()->json(['error' => 'Usuário não encontrado.'], 404);
        }

        // Atualiza os atributos do usuário somente se os dados estiverem presentes
        if (!empty($request->cpf)) {
            $user->cpf = $request->cpf;
        }
        if (!empty($request->uf)) {
            $user->uf = $request->uf;
        }
        if (!empty($request->endereco)) {
            $user->endereco = $request->endereco;
        }
        if (!empty($request->cep)) {
            $user->cep = $request->cep;
        }
        if (!empty($request->cidade)) {
            $user->cidade = $request->cidade;
        }
        if (!empty($request->identificacao)) {
            $user->identificacao = $request->identificacao;
        }
        if (!empty($request->proficao)) {
            $user->proficao = $request->proficao;
        }
        if (!empty($request->nacionalidade)) {
            $user->nacionalidade = $request->nacionalidade;
        }
        if (!empty($request->estado)) {
            $user->estado = $request->estado;
        }

        // Salva as alterações
        $user->save();

        // Retorna uma mensagem de sucesso
        return response()->json(['message' => 'Seus dados foram enviados. Clique em Comprar Novamente']);
    }
}
