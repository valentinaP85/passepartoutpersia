<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardboardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardboard_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quote_id');
            $table->foreign('quote_id')->references('id')->on('quotes')->onDelete('cascade');
            $table->unsignedBigInteger('cardboard_id');
            $table->foreign('cardboard_id')->references('id')->on('cardboards')->onDelete('cascade');
            $table->integer('nCardboard');
            $table->string('cardboardColor');
            $table->string('misuraE');
            $table->string('misuraI');
            $table->string('fondo')->nullable();
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
        Schema::dropIfExists('cardboard_details');
    }
}
