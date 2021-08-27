<?php

use App\Models\Cardboard;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardboards', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('caratteristiche');
            $table->string('spessore');
            $table->string('misuraFoglio');
            $table->text('colori');
            $table->text('superficie');
            $table->boolean('status');
            $table->string('img')->nullable();
            $table->timestamps();
        });

        $cardboard1= new Cardboard();
            $cardboard1->id = "1";
            $cardboard1->nome = "AF";
            $cardboard1->caratteristiche = "cartone acid-free";
            $cardboard1->colori = " bianco, avorio e nero ";
            $cardboard1->spessore = "1,8 ";
            $cardboard1->misuraFoglio = "80 x 120 cm";
            $cardboard1->superficie = "ruvida";
            $cardboard1->status = "1";          
            $cardboard1->save();

            $cardboard2= new Cardboard();
            $cardboard2->id = "2";
            $cardboard2->nome = "MC";
            $cardboard2->caratteristiche = "cartone adatto alla conservazione museale";
            $cardboard2->colori = " bianco, avorio e nero ";
            $cardboard2->spessore = "1,9";
            $cardboard2->misuraFoglio = "80 x 120 cm";
            $cardboard2->superficie = "liscia";
            $cardboard2->status = "1";          
            $cardboard2->save();


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cardboards');
    }
}
