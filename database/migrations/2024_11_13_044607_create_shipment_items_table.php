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
        Schema::create('shipment_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shipment_id');
            $table->string('name');
            $table->integer('quantity');
            $table->float('weight');
            $table->float('height');
            $table->float('width');
            $table->float('length');
            $table->text('description')->nullable();
            $table->timestamps();
        
            $table->foreign('shipment_id')->references('id')->on('shipments')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipment_items');
    }
};
