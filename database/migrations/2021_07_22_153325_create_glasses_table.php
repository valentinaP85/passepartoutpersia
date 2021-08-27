<?php

use App\Models\Glass;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        $glasses= ['vetro normale', 'vetro anti-UV e anti-riflesso'];

        foreach ($glasses as $glass) {
            $c = new Glass();
            $c -> name = $glass;
            $c -> save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glasses');
    }
}
