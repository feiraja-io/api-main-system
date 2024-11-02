<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id')->unsigned();
            $table->timestamps();
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

// Nome
// Descrição
// Responsável
// Imagens
// Acompanhar estoque por
// Endereço
// Cobrar por
// Bairro
// CEP
// Unidade do item
// Quantidade
// Cidade
// Notificar quando o produto estiver esgotado
// Notificar quando o estoque atingir:
// Estado
// Nome do pacote
// Preço por kilograma
// Quantidade de itens
// Adicionar esse produto a minha loja
// Atribuir a uma categoria
// Ajustar preço
// Valor adicional
// Valor para venda
// Destacar produto
// Definir limite por pedido
// Limite por pedido
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
