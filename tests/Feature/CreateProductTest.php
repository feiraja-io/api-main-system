<?php

namespace Tests\Feature;

use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Date;
use Carbon\Carbon;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    use RefreshDatabase;
    public function test_store_product_rout(): void
    {
        $store = Store::create(["cnpj_owner" => "22843722000140",'card_date' => '12/30', 'email' => "teste@teste.com",'password' => "12345678", "name" => "Teste", "owner" => "João da silva", "cnpj" => "22843722000140", "cities_delivery" => ["salvador"], 'logo' => "www.teste.com", 'team' => "www.teste.com", 'certifies' => ["www.teste.com"]]);
        $response = $this->post('/product', [
            'store_id' => $store->id,
            'name' =>  "Tomate",
            'price_in_cents' => 1000,
            'item_unity' => "item solto",
            'certifies' => ["www.teste.com"],
            'harvest_date' => Carbon::now()->toDateTimeString(),
            'expiration_date' => Carbon::now()->toDateTimeString(),
            'images' => [ "www.image.com" ],
            'notes' => "caixa de tomate",
            'stock_by' => "item",
            'stock_quantity' => 10,
            'in_marketplace' => true,
            'description' => "Tomate vermelhinho e fresco"
        ]);

        $response->assertStatus(200);
    }
}
