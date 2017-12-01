<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cleanings', function (Blueprint $table) {
            Schema::dropIfExists('cleanings');

            $table->increments('id');

            // date of the cleaning
            $table->date('date');
            // time of the day on which cleaning have been planned
            $table->time('cleaning_time');
            // description of cleaning
            $table->string('description');

            // foreign key pointing to outlets table
            $table->integer('outlet_id')->unsigned();
            $table->foreign('outlet_id')
                ->references('id')->on('outlets')->ondelete('cascade');

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
        Schema::dropIfExists('cleanings');
    }
}
