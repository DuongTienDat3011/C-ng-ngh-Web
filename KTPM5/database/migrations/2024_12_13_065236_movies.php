<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for movies table
class movies extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id('oid');
            $table->string('otitle');
            $table->string('odirector');
            $table->date('orelease_date');
            $table->integer('oduration');
            $table->foreignId('ocinema_id')->constrained('cinemas', 'oid')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
