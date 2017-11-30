<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalFeedingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal_feeding', function (Blueprint $table) {
            Schema::dropIfExists('animal_feeding');

            $table->increments('id');

            // automatic foreign key pointing to feedings table
            $table->integer('feeding_id')->unsigned();
            // automatic foreign key pointing to animals table
            $table->integer('animal_id')->unsigned();

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
        Schema::dropIfExists('animal_feeding');
    }
}
