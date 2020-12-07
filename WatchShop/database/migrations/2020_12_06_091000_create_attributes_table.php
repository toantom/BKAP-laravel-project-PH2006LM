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
            $table->char('waterproof',225);
            $table->char('material_face',225);
            $table->char('use_energy',225);
            $table->char('material_strap',225);
            $table->char('material_coat',225);
            $table->tinyInteger('type');
            $table->char('origin',225);
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
