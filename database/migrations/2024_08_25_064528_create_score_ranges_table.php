<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score_ranges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('questionnaire_type_id')->references('id')->on('questionnaire_types')->cascadeOnDelete('cascade');
            $table->integer('min_score');
            $table->integer('max_score');
            $table->string('interpretation');
            $table->string('interpretation_description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('score_ranges');
    }
}
