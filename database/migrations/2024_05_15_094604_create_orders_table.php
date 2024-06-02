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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(table: 'users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('address_id')->constrained(table: 'orders_address')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('ghichu')->nullable();
            $table->string('phivanchuyen');
            $table->string('tongchiphi');
            $table->string('trangthai')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
