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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('jenisMasakan_id')
            //     ->refereces('id')
            //     ->on('jenisMasakans')
            //     ->onDelete('cascade')
            //     ->onUpdate('cascade');
            $table->string('namaMasakan');
            $table->string('estimasiWaktu');
            $table->string('tingkatKesulitan', 100);
            $table->string('alat', 100);
            $table->string('bahan', 100);
            $table->string('caraMembuat', 100);
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
        Schema::dropIfExists('reseps');
    }
};
