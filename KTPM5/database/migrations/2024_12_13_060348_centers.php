<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for IT centers table
class centers extends Migration
{
    public function up()
    {
        Schema::create('it_centers', function (Blueprint $table) {
            $table->id('oid');
            $table->string('oname');
            $table->string('olocation');
            $table->string('ocontact_email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('it_centers');
    }
}
