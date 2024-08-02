<?php

namespace App\Observers;

use App\Models\Pessoa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PessoaObserver
{
    public function updated(Pessoa $pessoa)
    {
        if($pessoa->isDirty('is_online') && $pessoa->is_online ) {
            Log::info("A pessoa com ID {$pessoa->id} foi atualizada e está online.");
            $seguidores = $pessoa->followers;

            foreach($seguidores as $seguidor) {
                Log::info("Enviando webhook para o seguidor: {$seguidor->email}");
                try {
                    $response = Http::timeout(60)->post('https://cool-clear-elk.ngrok-free.app/api/webhook', [
                        'email' => $seguidor->email,
                        'nome' => $pessoa->nome,
                        'pessoa_id' => $pessoa->id,
                        'subject' => "Oi gata kk aposto que se come bosta kkkkkkk"
                    ]);

                    if ($response->successful()) {
                        Log::info("Webhook enviado com sucesso para o seguidor: {$seguidor->email}");
                    } else {
                        Log::error("Falha ao enviar webhook para o seguidor: {$seguidor->email}. Status: {$response->status()}");
                    }
                } catch (\Exception $e) {
                
                    Log::error("Erro ao enviar webhook para o seguidor: {$seguidor->email}. Mensagem: {$e->getMessage()}");
                }
            }
        }
    }
}
