<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('form_id');
            $table->string('name');
            $table->string('age');
            $table->string('gender');
            $table->string('village-town-city');
            $table->string('well_functioning_government');
            $table->string('low_level_corruption');
            $table->string('equitable_distribution');
            $table->string('good_relations');
            $table->string('free_flow');
            $table->string('high_levels');
            $table->string('sound_business');
            $table->string('acceptance_rights');
            $table->string('positive_peace');
            $table->string('negative_peace');
            $table->string('extra_ques1')->nullable();
            $table->string('extra_ques2')->nullable();
            $table->string('extra_ques3')->nullable();
            $table->timestamps();

            $table->foreign('form_id')->references('form_id')->on('forms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
