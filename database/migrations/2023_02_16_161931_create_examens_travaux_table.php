<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examens_travaux', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('utilisateurs');
            $table->unsignedBigInteger('sess_grmat_id');
            $table->foreign('sess_grmat_id')->references('id')->on('groupes_matieres');
            $table->string('extr_name');
            $table->date('extr_date');
            $table->integer('extr_pond');
            $table->integer('extr_surcombien');
            $table->char('extr_eorw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examens_travaux');
    }
};
