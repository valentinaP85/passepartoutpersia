<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFramesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frames', function (Blueprint $table) {
            $table->id();
            $table->string('profilo');
            $table->string('misuraFronte');
            $table->string('profondità');
            $table->string('essenza');
            $table->text('colore');
            $table->text('glass');
            $table->text('descrizione');
            $table->boolean('status');
            $table->string('imgProfilo')->nullable();
            $table->string('img')->nullable();
            $table->timestamps();
        });

        $frame1= new Frame();
            $frame1->id = "1";
            $frame1->profilo = "P2";
            $frame1->essenza = "Ayous, Rovere, Tiglio";
            $frame1->colore = " naturale, bianco, nero, grigio scuro";
            $frame1->glass = "Vetro normale da 2 mm, vetro anti-UV e Anti riflesso, plexiglass, senza vetro";
            $frame1->descrizione = "Il nostro profilo più richiesto!";
            $frame1->misuraFronte = "2cm";
            $frame1->profondità = "2,3 cm";
            $frame1->status = "1";          
            $frame1->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frames');
    }
}
