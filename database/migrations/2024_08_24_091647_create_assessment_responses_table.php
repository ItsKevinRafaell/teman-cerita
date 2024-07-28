<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssessmentResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assessment_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_assessment_id')->references('id')->on('user_assessments')->cascadeOnDelete('cascade');
            $table->foreignId('question_id')->references('id')->on('question_assessments')->cascadeOnDelete('cascade');
            $table->foreignId('answer_id')->references('id')->on('question_answers')->cascadeOnDelete('cascade');
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
        Schema::dropIfExists('assessment_responses');
    }
}
