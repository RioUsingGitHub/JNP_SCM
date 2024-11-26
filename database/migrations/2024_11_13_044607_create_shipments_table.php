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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Pending', 'Pickup', 'Dropped', 'Blank'])->default('Pending');
            $table->string('sender_name');
            $table->string('sender_city');
            $table->string('sender_address');
            $table->string('sender_phone');
            $table->string('sender_postal_code');
            $table->string('recipient_name');
            $table->string('recipient_city');
            $table->string('recipient_address');
            $table->string('recipient_phone');
            $table->string('recipient_postal_code');
            $table->date('schedule_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
