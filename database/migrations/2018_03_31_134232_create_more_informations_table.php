<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoreInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('more_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('country_birth');
            $table->date('date_birth');
            $table->string('cpf');
            $table->string('passport');
            $table->boolean('foreign');
            $table->boolean('smoker');
            $table->boolean('have_dog');
            $table->string('confidence_phone');

            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('meetings');

            $table->integer('profile_id')->unsigned();
            $table->foreign('profile_id')->references('id')->on('profiles');

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
        Schema::dropIfExists('more_informations');
    }
}
