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
    public function test_store_store_rout(): void
    {
        $response = $this->post('/store', [
            "name" => "Teste",
            "owner" => "João da silva",
            "cnpj" => "22843722000140",
            "cities_delivery" => ["campo formoso"],
            'logo' => "www.teste.com",
            'team' => "www.teste.com",
            'certifys' => ["www.teste.com"],
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
