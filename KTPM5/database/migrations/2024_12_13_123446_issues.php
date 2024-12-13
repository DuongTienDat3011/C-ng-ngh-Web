<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id(); // id (Primary Key)
            $table->unsignedBigInteger('computer_id'); // computer_id (Foreign Key)
            $table->string('reported_by', 50)->nullable(); // reported_by
            $table->dateTime('reported_date'); // reported_date
            $table->text('description'); // description
            $table->enum('urgency', ['Low', 'Medium', 'High']); // urgency
            $table->enum('status', ['Open', 'In Progress', 'Resolved']); // status
            $table->timestamps();
    
            $table->foreign('computer_id')->references('id')->on('computers')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};