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
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('name_product');
            $table->string('slug_product');
            $table->string('code_product');
            $table->string('quantity_product');
            $table->string('tags_product');
            $table->string('weight_product')->nullable();
            $table->string('price_selling');
            $table->string('price_discount')->nullable();
            $table->string('description_short');
            $table->string('description_long');
            $table->string('thambnail_product');
            $table->integer('deals')->nullable();
            $table->integer('featured')->nullable();
            $table->integer('special_deals')->nullable();
            $table->integer('special_offer')->nullable();
            $table->integer('status')->default(0);
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
