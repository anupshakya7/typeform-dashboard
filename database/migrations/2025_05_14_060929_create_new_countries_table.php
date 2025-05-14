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
        Schema::create('new_countries_state', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('parent_code')->nullable();
            $table->integer('level')->comment("0 => Country, 1 => State");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_countries');
    }
};
