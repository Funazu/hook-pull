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
        Schema::create('terminal_permissions', function (Blueprint $table) {
            $table->id();
            $table->string('id_terminal_permission')->unique();
            $table->foreignId('user_id');
            $table->foreignId('hook_id');
            $table->string('title');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminal_permissions');
    }
};
