<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Migration for hardware devices table
class hardwaredevices extends Migration
{
    public function up()
    {
        Schema::create('hardware_devices', function (Blueprint $table) {
            $table->id('oid');
            $table->string('odevice_name');
            $table->string('otype');
            $table->boolean('ostatus')->default(true);
            $table->foreignId('ocenter_id')->constrained('it_centers', 'oid')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hardware_devices');
    }
}

