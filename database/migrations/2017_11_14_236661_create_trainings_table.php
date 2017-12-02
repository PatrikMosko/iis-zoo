<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            Schema::dropIfExists('trainings');

            $table->increments('id');

            // date when particular training was held
            $table->date('date');
            $table->date('time');
            // Name of the course/training
            $table->string('name');
            // todo
            $table->integer('trainingable_id');
            // todo
            $table->string('trainingable_type');

            // foreign key pointing to animal_types table
            $table->integer('animal_type_id')->nullable()->unsigned();
            $table->foreign('animal_type_id')
                ->references('id')->on('animal_types')->onDelete('cascade');

            // foreign key pointing to animal_types table
            $table->integer('outlet_type_id')->nullable()->unsigned();
            $table->foreign('outlet_type_id')
                ->references('id')->on('outlet_types')->onDelete('cascade');

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
        Schema::dropIfExists('trainings');
    }
}
