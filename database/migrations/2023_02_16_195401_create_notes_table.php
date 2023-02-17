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
        Schema::create('notes', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('group_stud_id');
            $table->foreign('group_stud_id')->references('id')->on('groupes_eleves');
            $table->unsignedBigInteger('extr_id');
            $table->foreign('extr_id')->references('id')->on('examens_travaux');
            $table->integer('note_note');
            $table->integer('note_note100');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
