<?php
/**
 *
 */

include_once "../../_autoload.php";

require_once BASE_DIR . "onlinetest/dao/ImplQuestionDao.php";
require_once BASE_DIR . "onlinetest/dao/ImplAnswerDao.php";

session_start();

if (!isset($_SESSION['questionsIds'])) {
    header("Location: " . BASE_URL . 'onlinetest/startTest/model.php');
}

$questionDao = new QuestionDaoImpl();
$answerDao = new AnswerDaoImpl();

// правильные ответы согласно БД
$countCorrectQuestions = $questionDao
        ->getCorrectCountQuestionsByAnswers($_SESSION['questionsIds'], $_SESSION['answers']);

//колличество вопросов
$countAllQuestions = count($_SESSION['questionsIds']);

unset($_SESSION['answers']);
// setcookie(session_name('answers'), '');
?>
<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../res/css/materialize.min.css" media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="../res/css/style.css" media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="../res/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../res/js/materialize.min.js"></script>
</head>
<body class="deep-orange lighten-5">

<nav>
    <div class="nav-wrapper red lighten-1">
        <a href="#" class="brand-logo right">Online-test</a>
        <ul class="left">
            <li><a href="index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <h3 class=' cyan-text text-darken-3 center'>
        Ваш результат: <?php echo $countCorrectQuestions ?> из <?php echo $countAllQuestions ?>
    </h3>

    <div class="collection col l6">
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal'
           href="../AddQuestion&Answers/view.php">
            <i class='material-icons left'>input</i>
            Если хочешь добавить вопрос в тест, жми сюда=)
        </a>
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal' href="index.php">
            <i class='material-icons left'>replay</i>
            Начать тест заново!
        </a>
    </div>
</div>
</body>
</html>

