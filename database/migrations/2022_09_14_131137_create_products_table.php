<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('kind', ['sativa', 'indica', 'hybrid'])->nullable();
            $table->unsignedTinyInteger('grade')->default(0);
            $table->decimal('price_per_gram', 8, 2)->default(0);
            $table->enum('status', ['in stock', 'out of stock', 'hidden'])->default('in stock');
            $table->boolean('feature_flag')->default(false);
            $table->string('internal_sku')->unique();
            $table->text('description')->nullable();
            $table->string('wiki_link')->nullable();
            $table->text('product_images')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
