<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\File;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateStoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_store_store_rout(): void
    {

        $request = $this->post('/register', [
            "name" => "Teste",
            "owner" => "João da silva",
            "cnpj" => "22843722000140",
            'email' => "tesst@teste.com",
            'password' => "12345678",
            'logo' => "www.teste.com",
            'team_pictures' => ["www.teste.com"],
            'production_pictures' => ["www.teste.com"],
            'farm_pictures' => ["www.teste.com"],
            "cities_delivery" => ["campo formoso"],
            'branch' => '10000',
            'checking account' =>'1000000',
            'digit' => '1122231',
            'address'=> [
                "address" => "avenida do xpto",
                "street" => "xpto",
                "cep" => "00000000",
                "city" => "salvador",
                "state" => "BA"
            ]
        ]);
        $request->assertStatus(200);
    }
}
