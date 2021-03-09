<?php
include_once "../../_autoload.php";
require_once BASE_DIR . "onlinetest/model/Question.php";
require_once BASE_DIR . "onlinetest/connectionManager/DB_connection.php";
require_once BASE_DIR . "onlinetest/dao/QuestionsDao.php";

/**
 * @author Maria Ostashevskaya
 */
class QuestionDaoImpl implements QuestionsDao
{
    public function getQuestion($id)  //получить вопрос
    {

        $sql = "SELECT `question` FROM `question` WHERE `id` = '$id'";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $question = null;
        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
            $text = $row[1];
            $question = new Question($id, $text);
        }

        return $question;
    }

    public function getAllQuestions($limit = 0, $random = true)  //получить список вопросов
    {
        $sql = "SELECT * FROM `question`";
        if ($random) {
            $sql .= " ORDER BY RAND() ";
        } else {
            $sql .= " ORDER BY question ";
        }
        if (!empty($limit)) {
            $sql .= " LIMIT " . $limit;
        }

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $questions = array();
        while ($row = mysqli_fetch_assoc($query_result)) {
            $questions[] = new Question($row['id'], $row['question']);
        }

        return $questions;
    }

    public function getQuestionsByIds($questionsIds)
    {
        if (empty($questionsIds)) {
            return array();
        }

        $sql = "SELECT * FROM `question` WHERE id IN (" . implode(',', $questionsIds) . ")";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        $questions = array();
        while ($row = mysqli_fetch_assoc($query_result)) {
            $questions[] = new Question($row['id'], $row['question']);
        }

        return $questions;
    }

    public function saveQuestion($question) //сохранить вопрос
    {
        $sql = "INSERT INTO `question` (`question`)VALUES ('$question')";
        $query = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query) {
            return "вопрос сохранён! ";
        } else {
            return "ошибка при сохранении вопроса! ";
        }
    }

    public function updateQuestion($id, $question)  //обновить вопрос
    {
        $sql = "UPDATE `question` SET `question`.`question`= '$question' WHERE `question`.`id` IN('$id')";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "вопрос обновлён! ";
        } else {
            return "ошибка при обновлении вопроса! ";
        }
    }

    public function deleteQuestion($id)// удалить вопрос
    {
        $sql = "DELETE FROM  `question` WHERE `id`='$id'";

        $query = mysqli_query(DB_connection::db_connect(), $sql);

        if ($query) {
            return "вопрос № $id удалён! ";
        } else {
            return "ошибка при удалении вопроса! ";
        }
    }

    public function getAnswersByQuestion($id)//получить список ответов на вопрос
    {
        $sql
            = "SELECT `answer`.id, `answer`.answer, `answer`.trueAnswer FROM `answer`
        INNER JOIN `question_answer`
        ON `answer`.`id` = `question_answer`.`answer_id`
        INNER JOIN `question`
        ON `question`.`id` = `question_answer`.`question_id`
        WHERE `question_id`='$id';";

        $query_result = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query_result) {

            $arrResult = array();
            while ($row = mysqli_fetch_assoc($query_result)) {
                $arrResult[] = new Answer($row['answer'], $row['id'], $row['trueAnswer']);
            }

            return $arrResult;
        }
    }

    public function getCorrectCountQuestionsByAnswers($questionsIds, $answersIds)
    {
        $query = "SELECT qa.question_id
          FROM question_answer qa
            INNER JOIN answer a ON (a.id = qa.answer_id)
          WHERE qa.question_id in (" . implode(',', $questionsIds) . ")
          AND qa.answer_id in (" . implode(',', $answersIds) . ")
          AND a.trueAnswer = 1
          GROUP BY qa.question_id";

        $query_result = mysqli_query(DB_connection::db_connect(), $query);

        return count(mysqli_fetch_all($query_result));

    }

    public function getQuestionId($question)
    {
        $sql = "SELECT `id` FROM `question` WHERE `question`='$question'";

        $id = null;
        $query_result = mysqli_query(DB_connection::db_connect(), $sql);

        while ($row = mysqli_fetch_array($query_result)) {
            $id = $row[0];
        }

        return $id;
    }

    public function answersQuestion($answers_id, $question_id)
    {
        $sql = "INSERT INTO `question_answer` (`answer_id`,`question_id`) VALUES ('$answers_id','$question_id')";
        $query = mysqli_query(DB_connection::db_connect(), $sql);
        if ($query) {
            return " Ответы на вопрос сохранены!";
        } else {
            return " error ";
        }
    }
}
