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
        Schema::create('absences', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('per_id');
            $table->foreign('per_id')->references('id')->on('periodes');
            $table->unsignedBigInteger('group_stud_id');
            $table->foreign('group_stud_id')->references('id')->on('groupes_eleves');
            $table->string('abs_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absences');
    }
};
