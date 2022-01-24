<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    //criar um objeto usuario
    protected $user = Array(        
        'id' => 0,
        'name' => 'teste',
        'email' => 'teste@teste.com.br',
        'password' => 'password'
    );
    
    /**
     * Teste de registro de usuário.
     *
     * @return integer
     * @test
     */
    public function register()
    {
        $user = User::where('email', '=', $this->user['email'])->first();
        if($user)
            $user->delete();
        
        $response = $this->post('/api/public/register', $this->user);
        
        $response->assertStatus(201);
        return $response->json('data')['id'];
        // dd($this->user);
    }

    /**
     * Teste de criação de token de usuário.
     * @return Array
     * @depends register
     * @test
     */
    public function createToken($id)
    {                
        $response = $this->post('/api/public/token/create', ['user_id' => $id]);        
        $response->assertStatus(201);        
        return array('user_id' => $id, 'token' => $response->json('token'));
        // return $response->json('token');
    }

    /** 
     * Teste de ativação de usuário.
     * @depends createToken
     * @test
     */
    public function activate($params)
    {
        $response = $this->get('/api/public/user/'.$params['user_id'].'/activate/'.$params['token']);
        $response->assertJson(['message' => 'User activated']);
    }
    
    /**
     * Teste de autenticação de usuário.
     *
     * @return void
     * @depends createToken
     * @test
     */
    public function login($token)
    {
        $response = $this->post('/api/public/login', [
            'email' => $this->user['email'],
            'password' => $this->user['password']
        ]);        

        $response->assertStatus(200);        
    }

}
