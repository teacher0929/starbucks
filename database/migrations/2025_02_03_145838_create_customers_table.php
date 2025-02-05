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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('invited_id')->index()->nullable()->constrained('customers')->nullOnDelete();
            $table->string('name');
            $table->string('surname');
            $table->string('invitation_code')->unique();
            $table->string('username')->unique();
            $table->string('password');
            $table->dateTime('last_seen')->useCurrent();
            $table->unsignedTinyInteger('platform')->default(0);
            $table->unsignedTinyInteger('language')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
