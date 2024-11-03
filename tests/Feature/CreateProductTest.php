<?php

namespace Tests\Feature;

use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateProductTest extends TestCase
{
    public function test_store_product_rout(): void
    {
        $store = Store::register(['email' => "teste@teste.com",'password' => "12345678", "name" => "Teste", "owner" => "João da silva", "cnpj" => "22843722000140", "cities_delivery" => ["salvador"], 'logo' => "www.teste.com", 'team' => "www.teste.com", 'certifys' => ["www.teste.com"]]);
        $response = $this->post('/product', [
            'store_id' => $store->id,
            'name' =>  "Tomate",
            'description' => "Tomate vermelhinho e fresco",
            'responsible' => "João rocha fazendas",
            'image_path' => "image.png",
            'track_stock_by' => "Item",
            'charge_for' => "Peso",
            'item_unity' => "KG",
            'quantity' => 6,
            'notify_when_is_out' => true,
            'notify_when_storage_have' => 5,
            'product_in_store' => false,
            'additional_value' => 10,
            'selling_value_cents' => 1000,
            'highlight' => true,
            'limit' => 1,
            'category' => 1,
            'package_name' => "caixa de tomate",
            'package_price_cents' => 1000,
            'package_quantity' => 1
        ]);

        $response->assertStatus(200);
    }
}
