<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');

            $table->string('exit_address');
            $table->string('arrival_address');
            $table->date('date');
            $table->time('time');
            $table->integer('num_passenger');
            $table->boolean('status')->default(true); //significa que a viagem esta em aberto ou nao true = viagem em aberto e false para viagem finalizada
            $table->boolean('canceled')->default(false); //significa se a viagem foi cancelada ou nao

            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


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
        Schema::dropIfExists('trips');
    }
}
