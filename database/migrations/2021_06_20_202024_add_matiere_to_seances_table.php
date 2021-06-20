<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMatiereToSeancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seances', function (Blueprint $table) {
            $table->bigInteger('matiere_id')->unsigned()->index()->nullable();
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
        Schema::table('seances', function (Blueprint $table) {
            $table->dropColumn(['matiere_id']);
        });
    }
}
