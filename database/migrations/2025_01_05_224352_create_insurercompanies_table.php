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
        Schema::create('insurercompanies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('contact_name');
            $table->string('email');
            $table->string('primary_phone');
            $table->string('alternative_phone')->nullable();
            $table->string('company_address');
            $table->string('contact_email')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurercompanies');
    }
};
