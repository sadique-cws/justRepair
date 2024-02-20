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
            $table->string('preferred_time');
            $table->json('requirements')->nullable();
            $table->string('fullname');
            $table->string('mobileno');
            $table->string('address');
            $table->string('landmark')->nullable();
            $table->string('city');
            $table->string('complain_no')->unique();
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
