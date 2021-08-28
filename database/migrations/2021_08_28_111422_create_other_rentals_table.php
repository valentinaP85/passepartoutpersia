<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtherRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('other_rentals', function (Blueprint $table) {
            $table->id();
            
            $table->boolean('passepartout')->nullable();
            $table->string('colorPass')->nullable();
            $table->boolean('fondo')->nullable();
            $table->boolean('montaggio')->nullable();
            $table->boolean('smontaggio')->nullable();
            $table->integer('qta');
            $table->integer('vert');
            $table->integer('orizz');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals');
            $table->unsignedBigInteger('bookingRental_id');
            $table->foreign('bookingRental_id')->references('id')->on('booking_rentals');
                       
            
            
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
        Schema::dropIfExists('other_rentals');
    }
}
