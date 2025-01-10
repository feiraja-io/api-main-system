<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $u = [
            "name" => "Teste",
            'email' => "test@teste.com",
            'password' => "12345678",
        ];
        $user = User::create($u);
        $response = $this->post('/login', [
            'email' => $u['email'],
            'password' => $u['password']
        ]);

        $user->delete();
        $response->assertStatus(200);
    }
}
