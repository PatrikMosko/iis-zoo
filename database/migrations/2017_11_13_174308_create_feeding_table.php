<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('feedings', function (Blueprint $table) {
            Schema::dropIfExists('feedings');

            $table->increments('id');

            // amount of food to be consumned by particular animal
            $table->string('amount_of_food'); // string?
            // unit used to measure weight of food (g, Kg, lb, ...)
            $table->string('unit');
            // brief description for particular feeding
            $table->string('description');
            // date of the feeding
            $table->dateTime('date_time');

            // foreign key pointing to users table
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');

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

        Schema::dropIfExists('feedings');
    }
}
