<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            Schema::dropIfExists('users');

            $table->increments('id');

            //
            $table->string('user_name');
            //
            $table->string('email')->unique();
            //
            $table->string('password');
            //
            $table->string('full_name');
            //
            $table->date('birth_date');
            //
            $table->string('phone');
            //
            $table->boolean('is_active');
            //
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
