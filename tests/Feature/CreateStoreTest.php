<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\File;
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
        $stepOne = $this->post('/register/step-1', [
            "name" => "Teste",
            "owner" => "João da silva",
            "cnpj" => "22843722000140",
            'email' => "tesst@teste.com",
            'password' => "12345678",
        ]);
        $stepOne->assertStatus(200);
        $user = $stepOne->json()[0]['id'];

        $stepTwo = $this->post('/register/step-2', [
            'id' => $user,
            "cities_delivery" => ["campo formoso"],
            "address" => "avenida do xpto",
            "street" => "xpto",
            "cep" => "00000000",
            "city" => "salvador",
            "state" => "BA"
        ]);
        $stepTwo->assertStatus(200);

        $stepThree = $this->post('/register/step-3', [
            'id' => $user,
            'logo' => "www.teste.com",
            'team' => ["www.teste.com"],
            'certifies' => ["www.teste.com"]
        ]);
        $stepThree->assertStatus(200);
        $files = $stepThree->json()[0];
        File::destroy($files);
        $stepFour = $this->post('/register/step-4', [
            'id' => $user,
            'branch' => '10000',
            'checking account' =>'1000000',
            'digit' => '1122231'
        ]);
        $stepFour->assertStatus(200);
        User::destroy($user);
    }
}
