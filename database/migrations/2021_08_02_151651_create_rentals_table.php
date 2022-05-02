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
        $rental1= new rental();
        $rental1->id = "1";
        $rental1->rentalModel_id = "3";
        $rental1->size_id = "1";
        $rental1->rentalPrice = "4.50";
        $rental1->valueFrame = "35.00";
        $rental1->qta = "3";
        $rental1->status = "1";          
        $rental1->save();

        $rental2= new rental();
        $rental2->id = "2";
        $rental2->rentalModel_id = "1";
        $rental2->size_id = "2";
        $rental2->rentalPrice = "4.50";
        $rental2->valueFrame = "45.00";
        $rental2->qta = "82";
        $rental2->status = "1";          
        $rental2->save();

        $rental3= new rental();
        $rental3->id = "3";
        $rental3->rentalModel_id = "4";
        $rental3->size_id = "2";
        $rental3->rentalPrice = "4.50";
        $rental3->valueFrame = "45.00";
        $rental3->qta = "55";
        $rental3->status = "1";          
        $rental3->save();

        $rental4= new rental();
        $rental4->id = "4";
        $rental4->rentalModel_id = "2";
        $rental4->size_id = "4";
        $rental4->rentalPrice = "7.00";
        $rental4->valueFrame = "80.00";
        $rental4->qta = "52";
        $rental4->status = "1";          
        $rental4->save();

        $rental5= new rental();
        $rental5->id = "5";
        $rental5->rentalModel_id = "5";
        $rental5->size_id = "4";
        $rental5->rentalPrice = "7.00";
        $rental5->valueFrame = "69.00";
        $rental5->qta = "91";
        $rental5->status = "1";          
        $rental5->save();
 
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
