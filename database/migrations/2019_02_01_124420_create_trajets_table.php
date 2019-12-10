<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrajetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('depart');
            $table->string('destination');
            $table->integer('places');
            $table->string('prix');//séparés par ,
            $table->string('description')->nullable();
            $table->integer('id_user');
            $table->string('id_passagers')->nullable();//exp: 25,55,5
            $table->integer('id_vehicule')->nullable();
            $table->integer('id_date');
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
        Schema::dropIfExists('trajets');
    }
}
