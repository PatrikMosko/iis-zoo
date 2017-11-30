<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            Schema::dropIfExists('outlets');

            $table->increments('id');

            // name of Outlet
            $table->string('name');

            // foreign key pointing to outlets table
            $table->integer('outlet_type_id')->unsigned();
            $table->foreign('outlet_type_id')
                ->references('id')->on('outlet_types')->ondelete('cascade');

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
        Schema::dropIfExists('outlets');
    }
}
