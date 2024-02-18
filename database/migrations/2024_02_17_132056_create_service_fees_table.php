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
        Schema::create('service_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete("cascade");
            $table->string('service_fees_name')->required();
            $table->integer('service_fees')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('service_fees')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_fees');
    }
};
