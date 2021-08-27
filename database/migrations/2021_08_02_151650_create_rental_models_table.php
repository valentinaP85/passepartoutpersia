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
            $table->unsignedBigInteger('photo_id')->nullable();
            $table->foreign('photo_id')->references('id')->on('photos')->onDelete('cascade');
            $table->boolean('status')->default(true);
            $table->timestamps();

            // $table->...->onDelete('set null');
        });
        
       
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
