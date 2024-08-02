<?php

namespace App\Http\Controllers;

use App\Mail\WebhookMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class WebhookController extends Controller
{
    public function webhookMail(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'nome' => 'required|string',
            'pessoa_id' => 'required|integer',
            'subject' => 'required|string'
        ]);

        try {
            Mail::to($data['email'])->send(new WebhookMail($data));

            return response()->json(['message' => 'Webhook recebido e email enviado'], 200);
        } catch (\Exception $e) {
            Log::error("Erro ao enviar email: {$e->getMessage()}");
            return response()->json(['message' => 'Erro ao enviar o email'], 500);
        }
    }
}
