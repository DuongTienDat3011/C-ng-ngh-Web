<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for cinemas table
class cinemas extends Migration
{
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->id('oid');
            $table->string('oname');
            $table->string('olocation');
            $table->integer('ototal_seats');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cinemas');
    }
}