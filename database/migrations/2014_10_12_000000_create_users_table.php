<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom');
            $table->integer('age')->nullable();
            $table->string('photo')->default("profile.png");//lien vers le fichier enregistré dans storage public
            $table->string('email')->unique();
            $table->string('password');
            $table->string('description')->nullable();
            $table->string('experience')->default("débutant");
            $table->string('avis')->nullable();// nbr de votes,../5
            $table->integer('id_commentaire')->nullable();
            $table->tinyinteger('identite_ver')->default(0);
            $table->tinyinteger('permit_ver')->default(0);
            $table->tinyinteger('num_ver')->default(0);
            $table->tinyinteger('email_ver')->default(0);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
