<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bookingRental_id');
            $table->foreign('bookingRental_id')->references('id')->on('booking_rentals')->onDelete('cascade');
            $table->float('prezzoTrasporti')->nullable();
            $table->boolean('approvato')->nullable()->default(Null);
            $table->float('totale');
            $table->string('nomeSocietà')->nullable();
            $table->string('viaCivico');           
            $table->string('codiceUnivoco')->nullable();
            $table->string('pec')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
