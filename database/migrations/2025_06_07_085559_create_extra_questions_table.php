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
        Schema::create('extra_questions', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->string('question_id');
            $table->string('type');
            $table->string('title');
            $table->timestamps();

            $table->foreign('form_id')->references('form_id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('extra_questions');
    }
};
