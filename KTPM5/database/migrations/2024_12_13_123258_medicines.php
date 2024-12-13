<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class medicines extends Migration
{
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id('medicine_id'); // Mã thuốc
            $table->string('name'); // Tên thuốc
            $table->string('brand')->nullable(); // Thương hiệu
            $table->string('dosage', 50); // Thông tin liều lượng
            $table->string('form', 50); // Dạng thuốc
            $table->decimal('price', 10, 2); // Giá trên một đơn vị
            $table->integer('stock'); // Số lượng tồn kho
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('medicines');
    }
}