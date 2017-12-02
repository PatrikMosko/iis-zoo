<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutletTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlet_types', function (Blueprint $table) {
            Schema::dropIfExists('outlet_types');

            $table->increments('id');

            // type-name
            $table->string('name');
            // time required for cleaning particular outlet type
            $table->string('cleaning_time');
            // number of users required/needed for cleaning particular outlet type
            $table->integer('req_users_num')->unsigned();

            // foreign key pointing to trainings table
//            $table->integer('training_id')->unsigned();
//            $table->foreign('training_id')
//                ->references('id')->on('trainings')->ondelete('cascade');


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
        Schema::dropIfExists('outlet_types');
    }
}
