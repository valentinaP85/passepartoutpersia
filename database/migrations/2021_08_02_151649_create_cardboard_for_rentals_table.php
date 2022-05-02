<?php

use App\Models\CardboardForRental;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardboardForRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardboard_for_rentals', function (Blueprint $table) {
            $table->id();
            $table->float('pricePass');
            $table->float('priceFondo');
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->unsignedBigInteger('cardboard_id');
            $table->foreign('cardboard_id')->references('id')->on('cardboards')->onDelete('cascade');
            $table->timestamps();

        });

        $CFR1= new CardboardForRental();
        $CFR1->id = "1";
        $CFR1->pricePass = "2.80";
        $CFR1->priceFondo = "0.90";
        $CFR1->size_id = "1";
        $CFR1->cardboard_id = "1";    
        $CFR1->save();

        $CFR2= new CardboardForRental();
        $CFR2->id = "2";
        $CFR2->pricePass = "4.60";
        $CFR2->priceFondo = "1.80";
        $CFR2->size_id = "2";
        $CFR2->cardboard_id = "1";    
        $CFR2->save();

        $CFR3= new CardboardForRental();
        $CFR3->id = "3";
        $CFR3->pricePass = "4.60";
        $CFR3->priceFondo = "1.80";
        $CFR3->size_id = "3";
        $CFR3->cardboard_id = "1";    
        $CFR3->save();

        $CFR4= new CardboardForRental();
        $CFR4->id = "4";
        $CFR4->pricePass = "7.20";
        $CFR4->priceFondo = "1.80";
        $CFR4->size_id = "6";
        $CFR4->cardboard_id = "1";    
        $CFR4->save();

        $CFR5= new CardboardForRental();
        $CFR5->id = "5";
        $CFR5->pricePass = "4.60";
        $CFR5->priceFondo = "1.80";
        $CFR5->size_id = "2";
        $CFR5->cardboard_id = "1";    
        $CFR5->save();

        $CFR6= new CardboardForRental();
        $CFR6->id = "6";
        $CFR6->pricePass = "7.20";
        $CFR6->priceFondo = "1.80";
        $CFR6->size_id = "4";
        $CFR6->cardboard_id = "1";    
        $CFR6->save();

        $CFR7= new CardboardForRental();
        $CFR7->id = "7";
        $CFR7->pricePass = "7.20";
        $CFR7->priceFondo = "3.60";
        $CFR7->size_id = "5";
        $CFR7->cardboard_id = "1";    
        $CFR7->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardboard_for_rentals');
    }
}
