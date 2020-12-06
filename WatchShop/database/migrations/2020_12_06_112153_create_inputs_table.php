<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInputsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inputs', function (Blueprint $table) {
            $table->id();
            $table->char('sku',225)->unique();
            $table->foreign('sku')->references('sku')->on('products');
            $table->foreignId('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->unsignedInteger('quantity');
            $table->unsignedFloat('price');
            $table->unsignedFloat('total');


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
        Schema::dropIfExists('inputs');
    }
}
