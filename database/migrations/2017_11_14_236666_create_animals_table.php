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
            $table->integer('outlet_id')->unsigned();
            $table->foreign( 'outlet_id')
                ->references('id')->on('outlets')->onDelete('cascade');
            $table->string('name');
            $table->date('birth_date');
            $table->string('birth_country');
            $table->string('parent');
            $table->string('occurrence_place');
            $table->string('description');
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
