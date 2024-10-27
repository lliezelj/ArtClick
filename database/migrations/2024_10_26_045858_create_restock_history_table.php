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
        Schema::create('restock_history', function (Blueprint $table) {
            $table->id();
            $table->string('stock_description');
            $table->integer('stock_quantity');
            $table->foreignId('inventory_id')
            ->constrained('inventory')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('restock_history');
    }
};
