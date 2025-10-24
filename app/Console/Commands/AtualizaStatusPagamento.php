<?php

namespace App\Console\Commands;

use App\Models\UserPlanos;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class AtualizaStatusPagamento extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'atualizaStatusPagamento:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Buscar planos que já expiraram
        $planosVencidos = UserPlanos::where('data_vencimento', '<', Carbon::today())
            ->where('status', '!=', 'cancelado')
            ->get();

        foreach ($planosVencidos as $plano) {
            $url = "https://api.example.com/validate-payment/{$plano->id_pagamento}";

            // Faz a requisição para verificar o status do pagamento
            $response = Http::get($url);

            if ($response->ok() && $response->json()['status'] == 'pago') {
                $this->info("Plano do usuário {$plano->id_user} está pago.");
            } else {
                $plano->update(['status' => 'cancelado']);
                $this->info("Plano do usuário {$plano->id_user} foi cancelado.");
            }
        }

        $this->info('Verificação de planos concluída.');
    }
}
