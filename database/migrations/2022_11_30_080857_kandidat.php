<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kandidat extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
        Schema::create('kandidat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_calon_ketua');
            $table->string('nama_wakil_ketua');
            $table->string('foto_calon_ketua');
            $table->string('foto_wakil_ketua');
            $table->text('visi');
            $table->text('misi');
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
        Schema::dropIfExists('kandidat');
    }
}
