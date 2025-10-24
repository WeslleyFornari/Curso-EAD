<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Plano;
use App\Models\User;
use App\Models\UserPlanos;
use App\Notifications\WelcomeEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ApiController extends Controller
{

    private $userModel;
    private $planosModel;
    private $userPagamentoModel;
    private $password;
    public function __construct(User $user, Plano $planosModel, UserPlanos $userPagamentoModel) { 
        $this->userModel = $user;
        $this->planosModel = $planosModel;
        $this->userPagamentoModel = $userPagamentoModel;
    }
    public function startApi(Request $request){
        $this->validateStartApi($request);
        // Log::info('Dados', ['Recebido: ' => $request]);
        try {
            $empresa = $this->planosModel->find($request['plano']['id']);
            $createUser = $this->createUser($request['name'], $request['email'], $empresa->empresa_id);
            $createPayment = $this->createPayment($createUser->id, $request['plano'], $request['pagamento']); 

            // $createUser->notify(new WelcomeEmailNotification($createUser->email, $this->password));

    
            return response()->json(['message' => 'Process completed successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to complete the process.', 'errorMessage' => $e->getMessage()], 500);
        }
    }
    
    private function validateStartApi($request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'plano' => 'required|array',
            'plano.id' => 'required|integer',
            'pagamento.id' => 'required|string',
        ], [
            'name.required' => 'O nome é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.unique' => 'Este email já está cadastrado.',
            'plano.required' => 'O plano é obrigatório.',
        ]);
    
        if ($validator->fails()) {
            return ($validator);
        }
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $userDB = $this->userModel->find($user->id);
            $token = Str::random(60);
            $userDB->update([
                'api_token' => hash('sha256', $token),
            ]);
            $userDB = $this->userModel->find($user->id);
    
            return response()->json(['token' => $userDB->api_token], 200);
        }
    
        return response()->json(['error' => 'Invalid credentials'], 401);
    }
    
    private function validateLogin($request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);
    
        if ($validator->fails()) {
            throw new \Illuminate\Validation\ValidationException($validator);
        }
    }

    private function createUser($name, $email, $companyId){

        $password = Str::random(10);
        $this->password = $password;
        $user = $this->userModel->create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'email_verified_at' => date('Y-m-d'),
            'empresa_id' => $companyId
        ]);
        return $user;
    }
    private function createPayment($userId, $plan, $payment){ 
        if (!isset($plan['id'])) {
            throw new \Exception('Plano inválido');
        }

        $plan = Plano::find($plan['id']);
        $vigenciaMeses = $plan->vigencia && is_numeric($plan->vigencia) ? $plan->vigencia : 12;
    
        $payment = $this->userPagamentoModel->create([
            'user_id'        => $userId,
            'plano_id'          => $plan['id'],
            'status'            => 'pago',
            'tipo_pagamento'    => $payment['tipo_pagamento'],
            'id_pagamento'      => $payment['id'] ?? '',
            'data_vencimento'   => Carbon::now()->addMonths($vigenciaMeses)
        ]);
    
        return $payment;
    }

    public function getPlans(){
        $planos = $this->planosModel->where('status', 'ativo')->orderBy('id', 'asc')->get();

        return response()->json($planos);
    }

    
}

