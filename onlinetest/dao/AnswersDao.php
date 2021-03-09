<?php

/**
 * @author Maria Ostashevskaya
 */
interface AnswersDao
{

    public function getAnswer($id);

    public function getAllAnswers();

    public function saveAnswer($answer, $trueAnswer);

    public function updateAnswer($id, $answer);

    public function deleteAnswer($id);

    public function getAnswerId($answer);

    public function getTrueAnswer($id);

}