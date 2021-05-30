<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfabsentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profabsents', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->enum('status',['0','1'])->default('0');
            $table->bigInteger('seance_id')->unsigned()->index(); // don't use unsigned and index with bigInteger
            $table->bigInteger('matiere_id')->unsigned()->index();
            $table->bigInteger('profs_id')->unsigned()->index();
            $table->foreign('seance_id')->references('id')->on('seances')->onDelete('cascade');
            $table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
            $table->foreign('profs_id')->references('id')->on('profs')->onDelete('cascade');
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
        Schema::dropIfExists('profabsents');
    }
}
