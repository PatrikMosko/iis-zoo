<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleaning_user', function (Blueprint $table) {
            Schema::dropIfExists('cleaning_user');

            $table->increments('id');

            // automatic foreign key pointing to cleanings table
            $table->integer('cleaning_id')->unsigned();
            // automatic foreign key pointing to users table
            $table->integer('user_id')->unsigned();

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
        Schema::dropIfExists('cleaning_user');
    }
}
