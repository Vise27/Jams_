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
            $table->string('name', 100)->unique();
            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->unsignedBigInteger('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->unsignedBigInteger('categorie_id');
            $table->foreign('categorie_id')->references('id')->on('categories');
            $table->unsignedBigInteger('modelo_id');
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->decimal('price', 10, 2);
            $table->integer('stock');
            $table->string('description', 250)->nullable();
            $table->string('image', 250)->nullable();
            $table->enum('status', ['active', 'in-active']);
            $table->timestamps();
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
