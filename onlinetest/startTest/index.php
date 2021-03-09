<?php
include_once "../../_autoload.php";

header("Content-type: text/html; charset=utf-8");

session_start();

if (isset($_SESSION['answers'])) {
    unset($_SESSION['answers']);
}
if (isset($_SESSION['questionsIds'])) {
    unset($_SESSION['questionsIds']);
}

if (!isset($_POST['test'])) {
    $title = 'Пройдите тест!';
} else {
    header('Location: ' . BASE_URL . 'onlinetest/startTest/model.php');
}
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
    <meta charset="utf-8"/>
</head>
<body class="deep-orange lighten-5">

<nav>
    <div class="nav-wrapper red lighten-1">
        <a href="#" class="brand-logo right">Online-test</a>
        <ul class="left">
            <li><a href="<?php echo BASE_URL ?>index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container">

    <h3 class=' cyan-text text-darken-3 '><?php echo $title; ?></h3>

    <form action="index.php" method="post">
        <input type="hidden" name="test">
        <button class='waves-effect waves-teal btn-large' type='submit'>
            <i class='material-icons center '>play_circle_outline</i> Начать тест
        </button>

    </form>
    <div class="collection col l6">
        <a class='  collection-item cyan-text text-darken-1 red lighten-5 waves-effect waves-teal'
           href="../AddQuestion&Answers/view.php">
            <i class='material-icons left'>input</i>
            Если хочешь добавить вопрос в тест, жми сюда=)
        </a>
    </div>
</div>
</body>
</html>
