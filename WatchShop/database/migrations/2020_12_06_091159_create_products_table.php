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
            $table->char('name',255)->unique();
            $table->char('slug',255);
            $table->char('sku',255)->unique();
            $table->unsignedFloat('price', 11);
            $table->unsignedFloat('discount',11)->nullable();
            $table->unsignedInteger('stock');
            $table->foreignId('id_cate');
            $table->foreign('id_cate')->references('id')->on('categories');
            $table->foreignId('id_attr');
            $table->foreign('id_attr')->references('id')->on('attributes');
            $table->char('image',255);
            $table->text('des');
            $table->tinyInteger('type');
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
