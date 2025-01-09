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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('insurercompany_id');
            $table->unsignedBigInteger('productcategory_id');
            $table->string('description');
            $table->foreign('productcategory_id')->references('id')->on('productcategories')->onDelete('cascade');
            $table->foreign('insurercompany_id')->references('id')->on('insurercompanies')->onDelete('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};