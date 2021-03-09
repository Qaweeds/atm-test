<?php
include_once "../../_autoload.php";
require_once BASE_DIR . "onlinetest/dao/ImplQuestionDao.php";
require_once BASE_DIR . "onlinetest/dao/ImplAnswerDao.php";

class Response
{
    public function getAnswers()
    {
        $answers = array_map(
            function($answer) {
                return array(
                    'id' => $answer->getId(),
                    'answer' => $answer->getAnswer()
                );
            },
            (new AnswerDaoImpl())->getAllAnswers()
        );

        return $answers;
    }

    public function getAnswersByQuestion($parameters)
    {
        $answers = (new QuestionDaoImpl())->getAnswersByQuestion($parameters['question']);
        $answers = array_map(
            function($answer) {
                return array(
                    'id' => $answer->getId(),
                    'answer' => $answer->getAnswer(),
                    'trueAnswer' => (bool)$answer->getTrueAnswer()
                );
            },
            $answers
        );

        return $answers;
    }

    public function bindAnswersToQuestion()
    {

    }
}

if (!empty($_POST['action'])) {
    $action = $_POST['action'];
    $parameters = (isset($_POST['parameters']) && !empty($_POST['parameters'])) ? $_POST['parameters'] : array();

    $responseObj = new Response();
    $result = $responseObj->$action($parameters);

    $response = [
        'success' => true,
        'result' => $result
    ];

    echo json_encode($response);
}