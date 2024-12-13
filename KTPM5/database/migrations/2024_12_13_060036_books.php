<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for books table
class books extends Migration
{
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id('oid');
            $table->string('otitle');
            $table->string('oauthor');
            $table->year('opublication_year');
            $table->string('ogenre');
            $table->foreignId('olibrary_id')->constrained('libraries', 'oid')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('books');
    }
}