<?php

class Answer
{

    private $answer;
    private $id;
    private $trueAnswer;

    public function __construct($answer, $id, $trueAnswer = null)
    {
        $this->answer = $answer;
        $this->id = $id;
        $this->trueAnswer = $trueAnswer;
    }


    public function getTrueAnswer()
    {
        return $this->trueAnswer;
    }


    public function setTrueAnswer($trueAnswer)
    {
        $this->trueAnswer = $trueAnswer;
    }


    public function getAnswer()
    {
        return $this->answer;
    }


    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


}