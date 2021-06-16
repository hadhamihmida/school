<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfMatiereTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prof_matiere', function (Blueprint $table) {
            
        $table->bigInteger('prof_id')->unsigned()->index();
        $table->foreign('prof_id')->references('id')->on('profs')->onDelete('cascade');
        $table->bigInteger('matiere_id')->unsigned()->index();
        $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prof_matiere');
    }
}
