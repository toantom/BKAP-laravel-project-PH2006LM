<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->char('name',100)->unique();
            $table->char('email',225)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->char('password',225);
            $table->char('phone',15);
            $table->tinyInteger('gender');
            $table->date('birthday');
            $table->char('address',225);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
