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
        Schema::create('sess_grmat', function (Blueprint $table) {
            $table->id('sess_grmat_id');
            $table->unsignedBigInteger('sess_id');
            $table->foreign('sess_id')->references('id')->on('sessions');
            $table->unsignedBigInteger('groupmat_id');
            $table->foreign('groupmat_id')->references('id')->on('groupes_matieres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sess_grmat');
    }
};
