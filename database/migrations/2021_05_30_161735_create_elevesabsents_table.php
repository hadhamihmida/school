<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesabsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elevesabsents', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->bigInteger('seance_id')->unsigned()->index();
            $table->bigInteger('matiere_id')->unsigned()->index();
            $table->bigInteger('eleve_id')->unsigned()->index();
            $table->foreign('seance_id')->references('id')->on('seances')->onDelete('cascade');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreign('eleve_id')->references('id')->on('eleves')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('elevesabsents');
    }
}
