<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('preferred_date');
            $table->time('preferred_time');
            $table->foreignId("requirement_id")->constrained()->cascadeOnDelete();
            $table->string('fullname');
            $table->string('mobileno');
            $table->string('address');
            $table->string('landmark')->nullable();
            $table->string('city');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
