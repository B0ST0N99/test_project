<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnaireQuestionAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnaire_question_answers', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('questionnaire_answer_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->string('answer', 500);

            $table->foreign('questionnaire_answer_id')
                ->on('questionnaire_answers')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('question_id')
                ->on('questions')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('questionnaire_question_answers');
    }
}
