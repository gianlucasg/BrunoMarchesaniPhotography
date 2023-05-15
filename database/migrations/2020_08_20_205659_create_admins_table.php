<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            /*
            $table->string('navbar');
            $table->string('colorNavbar');
            $table->string('homeText')->nullable();
            $table->string('homeImg')->nullable();
            $table->string('footer');
            $table->string('colorFooter');
            $table->string('navMobile');
            $table->string('colorNavMobile');
            $table->string('activeNavMobile');
            $table->string('navBoton')->nullable();
            $table->string('textBoton')->nullable();
            $table->string('cardAlbum')->nullable();
            $table->string('textAlbum')->nullable();
            */
            $table->string('imagenPrincipal')->nullable();
            $table->string('imagenPrincipal_low')->nullable();
            $table->string('textoPrincipal')->nullable();
            $table->string('colorRedes')->nullable();
            $table->string('colorFooter')->nullable();
            $table->string('textoFooter')->nullable();
            $table->string('colorNavbar')->nullable();
            $table->string('textoNavbar')->nullable();
            $table->string('colorDiv')->nullable();
            $table->string('colorCuerpo')->nullable();
            $table->string('textoCuerpo')->nullable();
            $table->string('colorBotonUp')->nullable();
            $table->string('textoBotonUp')->nullable();
            $table->string('colorNavM')->nullable();
            $table->string('textoNavM')->nullable();
            $table->string('imagenSecundaria')->nullable();
            $table->string('imagenSecundaria_low')->nullable();
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
        Schema::dropIfExists('admins');
    }
}
