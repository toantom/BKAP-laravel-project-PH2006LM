<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedFloat('length_face');
            $table->char('waterproof',255);
            $table->char('material_face',255);
            $table->char('use_energy',255);
            $table->char('material_strap',255);
            $table->char('material_coat',255);
            $table->tinyInteger('type');
            $table->char('origin',255);
            $table->unsignedInteger('guarantee');
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
        Schema::dropIfExists('attributes');
    }
}
