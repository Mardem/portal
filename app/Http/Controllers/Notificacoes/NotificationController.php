<?php

namespace App\Http\Controllers\Notificacoes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

class NotificationController extends Controller
{
    public function index()
    {
        $notificacoes = \App\Models\Notification::orderBy('id', 'desc')->paginate();
        return view('notificacoes.todas')->with([
            'totalNotificacoes' => $notificacoes->count(),
            'notificacoes' => $notificacoes
        ]);

    }

    public function view ($id)
    {
        try {
            $notificacao = \App\Models\Notification::where('id', $id)->first();

            if($notificacao->visto == 0) {
                $u = \App\Models\Notification::find($notificacao->id);
                $u->visto = 1;
                $u->save();
            }

            return view('notificacoes.ver')->with([
                'not' => $notificacao
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Notificação não encontrada!' . $e->getMessage());
        }
    }

    public function response(Request $request)
    {
        try {
            $c = \App\Models\Empresa::where('nome', $request->remetente)->first();
            $user = \App\User::where('cpf', $c->cpf)->first();

            $m = new \App\Models\Message;
            $m->titulo = $request->assunto;
            $m->mensagem = $request->mensagem;
            $m->destino = $user->id;
            $m->status = 0;
            $m->visto = 0;
            $m->save();

            return redirect()->back()->with('success', 'Mensagem enviada com sucesso');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao enviar mensagem: ' . $e->getMessage());
        }
    }

    public function finish($id)
    {
        try {
            $n = \App\Models\Notification::find($id);
            $n->finalizado = 1;
            $n->save();

            return redirect()->back()->with('success', 'Finalizado com sucesso!');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Não foi possível finalizar: ' . $exception->getMessage());
        }

    }
}
