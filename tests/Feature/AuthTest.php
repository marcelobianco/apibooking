<?php

namespace Tests\Feature;

use App\Enums\ResponseCode;
use App\Enums\Roles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_fails_with_admin_role()
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Vali Named',
            'email' => 'test@email.com',
            'password' => 'ValidPassword',
            'password_confirmation' => 'ValidPassword',
            'role_id' => Roles::ROLE_ADMINISTRATOR
        ]);

        $response->assertStatus(ResponseCode::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_registration_success_with_owner_role()
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Vali Named',
            'email' => 'test@email.com',
            'password' => 'ValidPassword',
            'password_confirmation' => 'ValidPassword',
            'role_id' => Roles::ROLE_OWNER
        ]);

        $response->assertStatus(ResponseCode::HTTP_CREATED)->assertJsonStructure([
            'access_token',
        ]);
    }

    public function test_registration_success_with_user_role()
    {
        $response = $this->postJson('/api/v1/auth/register', [
            'name' => 'Vali Named',
            'email' => 'test@email.com',
            'password' => 'ValidPassword',
            'password_confirmation' => 'ValidPassword',
            'role_id' => Roles::ROLE_USER
        ]);

        $response->assertStatus(ResponseCode::HTTP_CREATED)->assertJsonStructure([
            'access_token',
        ]);
    }
}
