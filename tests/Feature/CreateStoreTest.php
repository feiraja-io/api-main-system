<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateStoreTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->post('/store', [
            "name" => "Teste",
            "owner" => "João da silva",
            "cnpj" => "22843722000140",
            "city-delivery" => "salvador",
            "address" => [
                "address" => "avaenida do xpto",
                "street" => "xpto",
                "cep" => "00000000",
                "city" => "salvador",
                "state" => "BA",
            ]
        ]);

        $response->assertStatus(200);
    }
}
