<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class laptops extends Migration
{
    public function up()
    {
        Schema::create('laptops', function (Blueprint $table) {
            $table->id('oid');
            $table->string('obrand');
            $table->string('omodel');
            $table->string('ospecifications');
            $table->boolean('orental_status')->default(false);
            $table->foreignId('orenter_id')->nullable()->constrained('renters', 'oid')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('laptops');
    }
}