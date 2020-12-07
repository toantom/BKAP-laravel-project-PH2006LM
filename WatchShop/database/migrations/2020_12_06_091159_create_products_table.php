<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->char('name',225);
            $table->char('slug',225);
            $table->char('sku',225)->unique();
            $table->unsignedFloat('price');
            $table->unsignedDouble('discount',8.2);
            $table->unsignedInteger('stock');
            $table->foreignId('id_cate');
            $table->foreign('id_cate')->references('id')->on('categories');
            $table->foreignId('id_attr');
            $table->foreign('id_attr')->references('id')->on('attributes');
            $table->char('image',225);
            $table->text('des');
            $table->tinyInteger('status');
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
}
