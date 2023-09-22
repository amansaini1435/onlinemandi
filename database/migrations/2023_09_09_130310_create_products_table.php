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
            $table->string('code', 50);
            $table->string('name');
            $table->string('hname'); 
            $table->string('image', 255);
            $table->boolean('status')->default(null);             
            $table->decimal('default_weight', 6, 2)->nullable();
            $table->string('weights', 255)->nullable();        
            $table->unsignedBigInteger('category_id')->index();
            $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('restrict');
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
