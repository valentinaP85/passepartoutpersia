<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('nameSurname');
            $table->string('cap');
            $table->string('email');
            $table->string('telefono')->nullable();
            $table->boolean('passepartout')->nullable();
            $table->string('colorPass')->nullable();
            $table->boolean('fondo')->nullable();
            $table->boolean('montaggio')->nullable();
            $table->boolean('smontaggio')->nullable();
            $table->string('trasporto');
            $table->integer('vert');
            $table->integer('orizz');
            $table->date('dal');
            $table->date('al');
            $table->unsignedBigInteger('rental_id');
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
            $table->string('message')->nullable();            
            $table->integer('qta');
            
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
        Schema::dropIfExists('booking_rentals');
    }
}
