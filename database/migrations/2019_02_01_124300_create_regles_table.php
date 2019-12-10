<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReglesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regles', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyinteger('fumer')->nullable();
            $table->tinyinteger('animaux')->nullable();
            $table->tinyinteger('nourriture')->nullable();
            $table->tinyinteger('musique')->nullable();
            $table->string('autre')->nullable();
            $table->integer('id_user');
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
        Schema::dropIfExists('regles');
    }
}
