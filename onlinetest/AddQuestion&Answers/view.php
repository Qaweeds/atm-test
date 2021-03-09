<!DOCTYPE html>
<html>
<head>
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../res/css/materialize.min.css" media="screen,projection"/>
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
            <li><a href="../startTest/index.php">На главную</a></li>
        </ul>
    </div>
</nav>
<div class="container row">
    <form action="controller.php" method="post" class="col s12">
        <h6 class=' cyan-text text-darken-3 '> Напишите вопрос: <input type="text" name="question"/></h6>
        <h6 class=' cyan-text text-darken-3 '> Вводите варианты ответов , напротив правильных вариантов поставте
            галочку и нажмите "отправить"</h6>
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="answer_a"
                              placeholder="Вариант а)"></textarea>
                </div>
                <p>
                    <input type='checkbox' name="wrightAnswer_a" value="1" id="test1"/>
                    <label for="test1"></label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="answer_b"
                              placeholder="Вариант b)"></textarea>
                </div>
                <p>
                    <input type="checkbox" name="wrightAnswer_b" value="1" id="test2"/>
                    <label for="test2"></label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="answer_c"
                              placeholder="Вариант c)"></textarea>
                </div>
                <p>
                    <input type='checkbox' name="wrightAnswer_c" value="1" id="test3"/>
                    <label for="test3"></label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="answer_d"
                              placeholder="Вариант d)"></textarea>
                </div>
                <p>
                    <input type='checkbox' name="wrightAnswer_d" value="1" id="test4"/>
                    <label for="test4"></label>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">mode_edit</i>
                    <textarea id="icon_prefix2" class="materialize-textarea" name="answer_e"
                              placeholder="Вариант e)"></textarea>
                </div>
                <p>
                    <input type='checkbox' name="wrightAnswer_e" value="1" id="test5"/>
                    <label for="test5"></label>
                </p>
            </div>
        </div>
        <button class='waves-effect waves-teal btn-large' type="submit">
            <i class='material-icons left large'>input</i> Отправить
        </button>
    </form>
</body>
</html>
