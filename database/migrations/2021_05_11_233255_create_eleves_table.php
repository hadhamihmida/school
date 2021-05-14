<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElevesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eleves', function (Blueprint $table) {
            $table->id();
            $table->string('nom_el');
            $table->string('prenom_el');
            $table->string('adresse_el');
            $table->string('email_pr');
            $table->date('date_naiss');
            $table->string('nom_pr');
            $table->string('classe');
            $table->text('image')->nullable();
            $table->bigInteger('parent_id')->unsigned();
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('parents')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eleves');
    }
}
