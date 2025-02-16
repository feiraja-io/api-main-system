<?php

namespace Tests\Feature;

use App\Models\BusinessType;
use App\Models\User;
use App\Models\File;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateStoreTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */
    public function test_store_store_rout(): void
    {

        BusinessType::create(['id' => 1, 'name' => 'Associação' ]);
        $request = $this->post('/register', [
            'basicInfo' => [
                "name" => "Teste",
                "owner" => "João da silva",
                "cnpj" => "22843722000140",
                'email' => "tesst@teste.com",
                'password' => "12345678",
                'businessType' => [1],
            ],
            "bankInfo" => ['pix' => '112@w23123.test'],
              "media" => [
                'logo' => "www.teste.com",
                'team' => ["www.teste.com"],
                'productionPictures' => ["www.teste.com"]
              ],
              'locationInfo' => [
                'address'=> [
                    "neighborhood" => "avenida do xpto",
                    "complement" => "avenida do xpto",
                    "street" => "xpto",
                    "cep" => "00000000",
                    "city" => "salvador",
                    "state" => "BA"
                ],
                "citiesDelivery" => ["campo formoso"]
            ]
        ]);
        $request->assertStatus(200);
    }
}
