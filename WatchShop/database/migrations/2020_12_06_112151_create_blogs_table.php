<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->char('name',255);
            $table->char('slug',255);
            $table->foreignId('id_cate');
            $table->foreign('id_cate')->references('id')->on('categories');
            $table->foreignId('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins');
            $table->char('image',255);
            $table->text('content');
            $table->unsignedInteger('status');

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
        Schema::dropIfExists('blogs');
    }
}
