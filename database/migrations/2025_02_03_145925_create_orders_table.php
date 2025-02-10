<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->index()->constrained()->cascadeOnDelete();
            $table->foreignId('product_id')->index()->constrained()->cascadeOnDelete();
            $table->double('price')->default(0);
            $table->text('note')->nullable();
            $table->unsignedTinyInteger('payment_method')->default(0);
            $table->unsignedTinyInteger('payment_status')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
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
