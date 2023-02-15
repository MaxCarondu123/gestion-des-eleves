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
        Schema::create('groupes_eleves', function (Blueprint $table) {
            $table->id('group_stud_id');
            $table->unsignedBigInteger('groupmat_id');
            $table->foreign('groupmat_id')->references('id')->on('groupes_matiere');
            $table->unsignedBigInteger('stud_id');
            $table->foreign('stud_id')->references('id')->on('eleves');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groupes_eleves');
    }
};
