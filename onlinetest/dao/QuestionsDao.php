<?php

/**
 * @author Maria Ostashevskaya
 */
interface QuestionsDao
{

    public function getQuestion($id);

    public function getAllQuestions();

    public function saveQuestion($question);

    public function updateQuestion($id, $question);

    public function deleteQuestion($id);

    public function getAnswersByQuestion($id);

    public function answersQuestion($answers_id, $question_id);

    public function getQuestionId($question);

}