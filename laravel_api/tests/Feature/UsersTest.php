<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Passport;
use Laravel\Sanctum\Sanctum;
use App\Models\User;
use Tests\TestCase;

class UsersTest extends TestCase
{
    use RefreshDatabase;

    //criar um objeto usuario
    protected $user = Array(        
        'name' => 'teste',
        'email' => 'teste@teste.com.br',
    );
    
    /**
     * Teste de registro de usuário.
     * @test
     */
    public function register()
    {
        $additionalFields = [
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];
        $user = array_merge($this->user, $additionalFields);
        $response = $this->post('/api/public/register', $user);
        $response->assertStatus(201);
        $this->assertDatabaseHas('users', [
            'name' => $this->user['name'],
            'email' => $this->user['email']
        ]);
    }

    /**
     * Teste de criação de token de usuário.
     * @test
     */
    public function createToken()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/public/token/create', ['user_id' => $user->id]);
        $response->assertStatus(201);
        $response->assertJsonStructure(['token']);
    }

    /**
     * Teste de verificação de token de usuário.
     * @test
     */
    public function verify()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/public/token/create', ['user_id' => $user->id]);
        $response = $this->post('/api/public/token/verify', [
            'user_id' => $user->id,
            'token' => $response['token']
        ]);
        $response->assertStatus(200);
    }

    /** 
     * Teste de ativação de usuário.
     * @test
     */
    public function activate()
    {
        $user = User::factory()->create();
        $response = $this->post('/api/public/token/create', ['user_id' => $user->id]);
        $activateResponse = $this->get('/api/public/user/'.$user->id.'/activate/'.$response['token']);
        $this->assertDatabaseHas('user_tokens', [
            'user_id' => $user->id,
            'token' => $response['token'],
            'used' => 1
        ]);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'active' => 1
        ]);
        $activateResponse->assertViewIs('advice')->assertStatus(200);
    }
    
    /**
     * Teste de autenticação de usuário.
     * @test
     */
    public function login()
    {
        $user = User::factory()->active()->create();
        Passport::actingAs($user);
        $response = $this->post('/api/public/login', [
            'email' => $user['email'],
            'password' => 'password',
            'device_name' => 'teste'
        ]);
        $response->assertStatus(200);
    }

    /**
     * Teste de exibir usuário logado.
     * @test
     */
    public function show()
    {
        Sanctum::actingAs(User::factory()->create([
            'name' => $this->user['name'],
            'email' => $this->user['email'],
        ]));

        $response = $this->get('/api/user');

        $response->assertStatus(200);        
        $response->assertJson([
            'name' => $this->user['name'],
            'email' => $this->user['email']
        ]);
    }

    

    /**
     * Teste de alteração de usuário.
     * @test
     */
    public function update()
    {
        $user = User::factory()->create([
            'name' => $this->user['name'],
            'email' => $this->user['email'],
        ]);
        Sanctum::actingAs($user);

        $response = $this->put('/api/user/' . $user->id, [
            'id' => $user->id,
            'name' => 'teste updated',
            'email' => $this->user['email'],
            'active' => 1
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);
        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'teste updated',
            'email' => $this->user['email'],
            'active' => 1
        ]);
    }
}
