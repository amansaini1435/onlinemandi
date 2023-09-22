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
        Schema::create('seller_databases', function (Blueprint $table) {
            $table->unsignedBigInteger('seller_id')->primary();
            $table->string('name');
            $table->boolean('status')->default(false);
            $table->timestamps();
            $table->foreign('seller_id')->references('id')->on('sellers')->onDelete('restrict');
        });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seller_databases');
    }
};
