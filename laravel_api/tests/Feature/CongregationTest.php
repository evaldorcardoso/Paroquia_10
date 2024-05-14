<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Laravel\Sanctum\Sanctum;
use App\Models\Congregation;
use App\Models\User;
use Tests\TestCase;

class CongregationTest extends TestCase
{
    use RefreshDatabase;

    private string $routePath = '/api/user/congregation';

    public function testCreateCongregation()
    {
        $user = User::factory()->active()->create();
        Sanctum::actingAs($user);

        $response = $this->post($this->routePath, [
            'name' => 'Test Congregation',
            'address' => 'Test Address',
            'pastor' => 'Test Pastor',
            'lat' => '0',
            'lon' => '0',
            'active' => '1'
        ]);

        $response->assertStatus(Response::HTTP_CREATED);
        $this->assertDatabaseHas('congregations', [
            'name' => 'Test Congregation',
            'address' => 'Test Address',
            'pastor' => 'Test Pastor',
            'lat' => '0',
            'lon' => '0',
            'user_id' => $user->id,
            'active' => '1'
        ]);
    }

    public function testUpdateCongregation()
    {
        $user = User::factory()->active()->create();
        Sanctum::actingAs($user);
        $congregation = Congregation::factory()->create([
            'user_id' => $user->id,
            'name' => 'Test Congregation',
            'address' => 'Test Address',
            'pastor' => 'Test Pastor',
            'lat' => '0',
            'lon' => '0',
            'active' => '1'
        ]);

        $response = $this->put($this->routePath, [
            'name' => 'Updated Congregation',
            'address' => 'Updated Address',
            'pastor' => 'Updated Pastor',
            'lat' => '1',
            'lon' => '1',
            'active' => '0'
        ]);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseHas('congregations', [
            'id' => $congregation->id,
            'name' => 'Updated Congregation',
            'address' => 'Updated Address',
            'pastor' => 'Updated Pastor',
            'lat' => '1',
            'lon' => '1',
            'user_id' => $user->id,
            'active' => '0'
        ]);
    }

    public function testShowUserCongregation()
    {
        $congregation = Congregation::factory()->create();
        Sanctum::actingAs($congregation->user);

        $response = $this->get($this->routePath);

        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonStructure([
            'data' => [
                'user_id',
                'active',
                'address',
                'lat',
                'lon',
                'name',
                'pastor',
                'image',
            ]
        ]);
    }

    public function testDeleteCongregation()
    {
        $congregation = Congregation::factory()->create();
        Sanctum::actingAs($congregation->user);

        $response = $this->delete($this->routePath);

        $response->assertStatus(Response::HTTP_OK);
        $this->assertDatabaseMissing('congregations', [
            'id' => $congregation->id,
        ]);
    }
}
