<?php
include_once "../../_autoload.php";

require_once BASE_DIR . "onlinetest/dao/ImplQuestionDao.php";
require_once BASE_DIR . "onlinetest/dao/ImplAnswerDao.php";

$questionDao = new QuestionDaoImpl();
$answerDao = new AnswerDaoImpl();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>jQuery UI Sortable - Connect lists</title>
    <script src="<?php echo ASSETS_URL ?>js/jquery.js"></script>
    <link rel="stylesheet" href="<?php echo ASSETS_URL ?>js/jqueryui/jquery-ui.min.css">
    <script src="<?php echo ASSETS_URL ?>js/jqueryui/jquery-ui.min.js"></script>
    <style>
        #sortable1 {
            height: 500px;
            overflow-x: hidden;
            overflow-y: scroll;
        }
        #sortable1, #sortable2 {
            border: 1px solid #eee;
            width: 400px;
            min-height: 20px;
            list-style-type: none;
            margin: 0;
            padding: 5px 0 0 0;
            float: left;
            margin-right: 10px;
            font-size: 12px !important;
        }
        #sortable1 li, #sortable2 li {
            margin: 0 5px 5px 5px;
            padding: 5px;
            font-size: 1.2em;
            width: 370px;
        }
    </style>
    <script>
        $(function() {
            $( "#sortable1, #sortable2" ).sortable({
                connectWith: ".connectedSortable"
            }).disableSelection();
            $( "#sortable1" ).sortable({
                stop: function(event, ui) {
                    var id = ui.item[0].value;
                    var sortable = $('#sortable2');
                    var element = sortable.find('li[value="' + id + '"]');
                    var $html = '<li class="ui-state-highlight" value="' + id + '">' +
                        '<input type="checkbox" class="trueAnswer" name="trueAnswer[]" value="' + id + '">' +
                            element.text() + '</li>';
                    element.replaceWith($html);
                    sortable.sortable("refresh");
                }
            });
            $( "#sortable2" ).sortable({
                stop: function(event, ui) {
                    var id = ui.item[0].value;
                    var sortable = $('#sortable1');
                    var element = sortable.find('li[value="' + id + '"]');
                    var $html = '<li class="ui-state-default" value="' + id + '">' +
                            element.text() + '</li>';
                    element.replaceWith($html);
                    sortable.sortable("refresh");
                }
            });
        });
    </script>
    <script>
        $(function() {
            function getAllAnswers()
            {
                $.ajax({
                    type: 'POST',
                    url: '<?php echo BASE_URL  ?>onlinetest/startTest/managerHandler.php',
                    data: {
                        'action': 'getAnswers',
                        'parameters': {}
                    },
                    success: function (data, textStatus) {
                        var $html = '';
                        var $sortable = $('#sortable1');
                        $sortable.empty();
                        for (var i in data.result) {
                            $html = '<li class="ui-state-default" value="' + data.result[i].id + '">' +
                                    data.result[i].answer + '</li>';
                            $sortable.append($html);
                        }
                        $($sortable).sortable("refresh");
                    },
                    error: function(message) {
                        console.log(message);
                    },
                    dataType : "json"
                });
            }

            $(document).ready(function() {
                getAllAnswers();

                $('#question').change(function() {
                    var question = $(this).val();
                    if (question == '') {
                        return;
                    }
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL  ?>onlinetest/startTest/managerHandler.php',
                        data: {
                            'action': 'getAnswersByQuestion',
                            'parameters': {
                                'question': question
                            }
                        },
                        success: function (data, textStatus) {
                            var $html = '';
                            var $sortable2 = $('#sortable2');
                            $sortable2.empty();
                            for (var i in data.result) {
                                $html = '<li class="ui-state-highlight" value="' + data.result[i].id + '">' +
                                    '<input type="checkbox" class="trueAnswer" name="trueAnswer[]" value="' + data.result[i].id + '">' +
                                    data.result[i].answer + '</li>';
                                $sortable2.append($html);
                            }
                            $($sortable2).sortable("refresh");
                        },
                        error: function(message) {
                            console.log(message);
                        },
                        dataType : "json"
                    });
                });

                $('#send').on('click', function() {
                    var answers = [];
                    $('#sortable2 li').each(function() {
                        answers.push($(this).val());
                    });
                    var trueAnswers = [];
                    $('#sortable2 .trueAnswer :checked').each(function() {
                        trueAnswers.push($(this).val());
                    });

                    $.ajax({
                        type: 'POST',
                        url: '<?php echo BASE_URL  ?>onlinetest/startTest/managerHandler.php',
                        data: {
                            'action': 'bindAnswersToQuestion',
                            'parameters': {
                                'question': $('#question').val(),
                                'answers': answers,
                                'trueAnswers': trueAnswers
                            }
                        },
                        success: function (data, textStatus) {
                            console.log(data);
                        },
                        error: function(message) {
                            console.log(message);
                        },
                        dataType : "json"
                    });
                });
            });
        });
    </script>
</head>
<body>
<?php
$questions = $questionDao->getAllQuestions(0, false);
?>
<div>
    <select id="question">
        <option value="">Select question</option>
        <?php foreach ($questions as $question) { ?>
        <option value="<?php echo $question->getId() ?>"><?php echo $question->getQuestion() ?></option>
        <?php } ?>
    </select>
</div>
<div>
    <ul id="sortable1" class="connectedSortable">
    </ul>
    <ul id="sortable2" class="connectedSortable">
    </ul>
</div>
<div>
    <input type="button" id="send" value="Update">
</div>
</body>
</html>
