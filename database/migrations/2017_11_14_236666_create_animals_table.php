<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            Schema::dropIfExists('animals');

            $table->increments('id');

            // name of the animal
            $table->string('name');
            // birth date of the animal
            $table->date('birth_date');
            //birth country of the animal
            $table->string('birth_country');
            // ID of parent of the animal todo: shouldnt this be integer (ID) ???
            $table->string('parent');
            // name of place where this animal could be spotted
            $table->string('occurrence_place');
            // description of animal
            $table->string('description');

            // foreign key pointing to outlets table
            $table->integer('outlet_id')->unsigned();
            // foreign key pointing to animal_types table
            $table->integer('animal_types_id')->unsigned();

            $table->foreign( 'outlet_id')
                ->references('id')->on('outlets')->onDelete('cascade');
            $table->foreign( 'animal_types_id')
                ->references('id')->on('animal_types')->onDelete('cascade');

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
        Schema::dropIfExists('animals');
    }
}
