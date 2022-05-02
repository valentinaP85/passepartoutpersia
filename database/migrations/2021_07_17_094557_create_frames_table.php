<?php

use App\Models\Frame;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('profondita');
            $table->string('essenze');
            $table->text('descrizione');
            $table->boolean('status');
            $table->string('imgProfilo')->nullable();
            $table->timestamps();
        });
        
        $frame1= new Frame();
        $frame1->id = "1";
        $frame1->profilo = "P2";
        $frame1->essenze = "Ayous, Rovere, Tiglio";
        $frame1->descrizione = "Il nostro profilo più richiesto!";
        $frame1->misuraFronte = "2";
        $frame1->profondita = "2,3 ";
        $frame1->status = "1";          
        $frame1->save();
        
        $frame2= new Frame();
        $frame2->id = "2";
        $frame2->profilo = "P4";
        $frame2->essenze = "Ayous, Tiglio";
        $frame2->descrizione = "Profilo molto profondo che consente l'utilizzo dei passepartout a Vassoio e grandi distanziatori.";
        $frame2->misuraFronte = "2";
        $frame2->profondita = "5,5 ";
        $frame2->status = "1";          
        $frame2->save();
        
        $frame3= new Frame();
        $frame3->id = "3";
        $frame3->profilo = "P5C";
        $frame3->essenze = "Ayous";
        $frame3->descrizione = "Il profilo di questa cornice è stato realizzato per esaltare le opere di un importante ed affermato artista, che ha voluto fare dell’intero quadro un opera d’arte. Questo particolare profilo artigianale, in legno, ha una profondità di  7cm. Il suo design moderno da tridimensionalità al quadro e dirige il focus dell’osservatore al centro dell’opera. Si consiglia per una migliore resa e per un effetto ancor più dinamico l’utilizzo dei vari tipi di distanziatori di seguito elencati.
        V15; V20; V30.";
        $frame3->misuraFronte = "2";
        $frame3->profondita = "7 ";
        $frame3->status = "1";          
        $frame3->save();
        
        $frame4= new Frame();
        $frame4->id = "4";
        $frame4->profilo = "PL";
        $frame4->essenze = "Ferro";
        $frame4->descrizione = "lamiera in ferro modellata con taglio Laser di precisione. Attualmente il profilo è disponibile solo per il noleggio";
        $frame4->misuraFronte = "0,7";
        $frame4->profondita = "3";
        $frame4->status = "1";          
        $frame4->save();
        
        $frame5= new Frame();
        $frame5->id = "5";
        $frame5->profilo = "P3";
        $frame5->essenze = "Ayous";
        $frame5->descrizione = "Profilo a cassetta legggermente più profondo del più famoso P2. Profilo ideale per l'utilizzo di piccoli distanziatori.";
        $frame5->misuraFronte = "2";
        $frame5->profondita = "4,4";
        $frame5->status = "1";          
        $frame5->save();
        
        $frame6= new Frame();
        $frame6->id = "6";
        $frame6->profilo = "P6";
        $frame6->essenze = "Ayous";
        $frame6->descrizione = "Profilo piatto generalmente preferito grezzo, l'ampia fascia permette di apprezzare tutte le venature del legno. Profilo poco profondo che non permette l'utilizzo del distanziatore.";
        $frame6->misuraFronte = "6";
        $frame6->profondita = "2";
        $frame6->status = "1";          
        $frame6->save();
        
        
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
