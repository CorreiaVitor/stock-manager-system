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
        Schema::create('stock_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignid('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('user_id')->constrained()->onDelete('restrict');
            $table->string('type', 10);
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('previous_quantity');
            $table->unsignedInteger('current_quantity');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_movement');
    }
};
