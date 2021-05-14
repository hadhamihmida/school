<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->string('nom_pr');
            $table->string('prenom_pr');
            $table->string('email');
            $table->integer('tel')->unsigned()->index();
            $table->integer('cin')->unsigned()->index();
            $table->string('nom_el');
            $table->string('prenom_el');
            $table->integer('nombre')->unsigned()->index();
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
        Schema::dropIfExists('parents');
    }
}
