<?php

namespace Tests\Feature;

use App\Enums\Roles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_fails_with_admin_role()
    {
        $response = $this->postJson('/api/auth/register', [
            'name' => 'Vali Named',
            'email' => 'test@email.com',
            'password' => 'ValidPassword',
            'password_confirmation' => 'ValidPassword',
            'role_id' => Roles::ROLE_ADMINISTRATOR
        ]);

        $response->assertStatus(422);
    }
}
