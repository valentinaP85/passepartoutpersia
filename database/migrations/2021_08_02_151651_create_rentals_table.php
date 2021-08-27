<?php

use App\Models\Rental;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rentalModel_id');
            $table->foreign('rentalModel_id')->references('id')->on('rental_models')->onDelete('cascade');
           $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->float('rentalPrice');
            $table->float('valueFrame');
            $table->integer('qta');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
        // $rental1= new rental();
        // $rental1->id = "1";
        // $rental1->name = "BP2";
        // 
        // $rental1->sizeName = "30x40";
        
        // $rental1->rentalPrice = "4,50";
        // $rental1->valueFrame = "44,50 ";
        // $rental1->qta = "22 ";
        // $rental1->status = "1";          
        // $rental1->save();
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentals');
    }
}
