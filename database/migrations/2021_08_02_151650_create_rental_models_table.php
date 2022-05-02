<?php


use App\Models\RentalModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRentalModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_models', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('color_id');
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->unsignedBigInteger('frame_id');
            $table->foreign('frame_id')->references('id')->on('frames')->onDelete('cascade');
            $table->unsignedBigInteger('glass_id');
            $table->foreign('glass_id')->references('id')->on('glasses')->onDelete('cascade');
            $table->unsignedBigInteger('photo_id')->nullable();//non può essere nullable?
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();

            // $table->...->onDelete('set null');
        });
        $rModel1= new RentalModel();
        $rModel1->id = "1";
        $rModel1->name = "NeP2";
        $rModel1->color_id = "3";
        $rModel1->frame_id = "1";
        $rModel1->glass_id = "1";
        $rModel1->status = "1";
        $rModel1->save();

        $rModel2= new RentalModel();
        $rModel2->id = "2";
        $rModel2->name = "NeP2-UV";
        $rModel2->color_id = "3";
        $rModel2->frame_id = "1";
        $rModel2->glass_id = "2";
        $rModel2->status = "1";
        $rModel2->save();

        $rModel3= new RentalModel();
        $rModel3->id = "3";
        $rModel3->name = "BiP2";
        $rModel3->color_id = "2";
        $rModel3->frame_id = "1";
        $rModel3->glass_id = "1";
        $rModel3->status = "1";
        $rModel3->save();

        $rModel4= new RentalModel();
        $rModel4->id = "4";
        $rModel4->name = "NatP2";
        $rModel4->color_id = "1";
        $rModel4->frame_id = "1";
        $rModel4->glass_id = "1";
        $rModel4->status = "1";
        $rModel4->save();

        $rModel5= new RentalModel();
        $rModel5->id = "5";
        $rModel5->name = "NePL";
        $rModel5->color_id = "3";
        $rModel5->frame_id = "4";
        $rModel5->glass_id = "1";
        $rModel5->status = "1";
        $rModel5->save();
        
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rental_models');
    }
}
