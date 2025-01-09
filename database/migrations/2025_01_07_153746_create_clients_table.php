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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('id_number');
            $table->string('primary_phone');
            $table->string('alternative_phone')->nullable(); 
            $table->text('postal_code')->nullable();
            $table->text('postal_address')->nullable();
            $table->text('email_address')->nullable();
            $table->text('pin_no')->nullable();
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('country_id');
            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->string('photo');
            $table->text('description')->nullable();  
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
