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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->index()->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('name_tm')->nullable();
            $table->string('name_ru')->nullable();
            $table->text('description');
            $table->text('description_tm')->nullable();
            $table->text('description_ru')->nullable();
            $table->string('image')->nullable();
            $table->double('price')->default(0);
            $table->unsignedTinyInteger('status')->default(0);
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
