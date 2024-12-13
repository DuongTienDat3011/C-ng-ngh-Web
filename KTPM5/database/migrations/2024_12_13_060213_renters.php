<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for renters table
class renters extends Migration
{
    public function up()
    {
        Schema::create('renters', function (Blueprint $table) {
            $table->id('oid');
            $table->string('oname');
            $table->string('ophone_number');
            $table->string('oemail');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('renters');
    }
}