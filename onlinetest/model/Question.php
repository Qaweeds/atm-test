<?php

class Question
{

    private $id;
    private $question;

    public function __construct($id, $question)
    {
        $this->id = $id;
        $this->question = $question;
    }


    public function getQuestion()
    {
        return $this->question;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
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