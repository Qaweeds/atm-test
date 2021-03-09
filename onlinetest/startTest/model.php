<?php
include_once "../../_autoload.php";

require_once BASE_DIR . "onlinetest/dao/ImplQuestionDao.php";
require_once BASE_DIR . "onlinetest/dao/ImplAnswerDao.php";

$questionDao = new QuestionDaoImpl();
$answerDao = new AnswerDaoImpl();

session_start();

$questionsList = array();
if (!isset($_SESSION['questionsIds'])) {
    $questions = $questionDao->getAllQuestions(Config::getConfig()['questionsCount']);
    $questionsIds = array();
    if (!empty($questions)) {
        $questionsList = $questions;
        foreach ($questions as $question) {
            $questionsIds[] = $question->getId();
        }
    }
    $_SESSION['questionsIds'] = $questionsIds;
} else {
    $questionsList = $questionDao->getQuestionsByIds($_SESSION['questionsIds']);
}

if (!isset($_SESSION['answers'])) {
    $_SESSION['answers'] = [];
    $_SESSION['questionsCounter'] = 0;
}
$countWrightAnswers = 0;
$questionsCounter = $_SESSION['questionsCounter'];

if (isset($_POST['answer']) && !empty($_POST['answer'])) {
    $answer = $_POST['answer'];

    $questionsCounter++;

    $_SESSION['answers'] = array_merge($_SESSION['answers'], $answer);
    $_SESSION['questionsCounter'] = $questionsCounter;

    if (!isset($questionsList[$questionsCounter])) {
        header('Location: controller.php');
    }
}

$title = $questionsList[$questionsCounter];

$countQuestions = count($questionsList);//колличество вопросов
$countTest = round(($questionsCounter * 100) / $countQuestions);
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
    <p class='cyan-text text-darken-2 right'><b>Пройдено <?php echo $countTest; ?> %</b></p>
    <br><br><h5 class=' cyan-text text-darken-3 '><?php echo $title->getQuestion(); ?></h5>
    <form action="model.php" method="post">
        <br><input type="hidden" name="q" value="<?php echo $questionsCounter; ?>">
        <?php
        foreach ($questionDao->getAnswersByQuestion($title->getId()) as $valAnswerByQuestion) {
            $countWrightAnswers++;
            $trueOrFalse = $answerDao->getTrueAnswer($valAnswerByQuestion->getId());

            echo "<br><input type='checkbox' name = 'answer[]' value='" . $valAnswerByQuestion->getId() . "' id='$countWrightAnswers'>";

            echo "<label for='$countWrightAnswers'>";
            print $valAnswerByQuestion->getAnswer();
            echo "<br></label><Br>";

        }
        if (($questionsCounter + 1) == $countQuestions) {
            echo " <Br><Br><button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons left large'>done_all</i> Узнать результат
        </button></form>";
        } else {
            echo " <Br><Br><button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons left large'>done_all</i> Следующий вопрос
        </button></form>";
        }
        ?>
    </form>
</div>
</body>
</html>
