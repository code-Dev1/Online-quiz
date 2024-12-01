<?php

class UserAnswer extends Database
{

    public function index()
    {
        $id = $_SESSION['auth_user']['id'];
        $param = [$id];
        $sql = "SELECT SUM(score) as scores ,attemptDate,title,type FROM useranswers 
        INNER JOIN questions ON qId= questionId  INNER JOIN quizcatagory 
        ON catagoryId = cId INNER JOIN quiztype ON tId = typeId WHERE userId = ? 
        GROUP BY questionId ORDER BY uaId DESC";
        return $this->exStatment($sql, $param);
    }

    public function totleScore()
    {
        $id = $_SESSION['auth_user']['id'];
        $param = [$id];
        $sql = "SELECT SUM(score) as scores FROM useranswers WHERE userId = ?";
        return $this->exStatment($sql, $param);
    }

    public function totleQuiz()
    {
        $id = $_SESSION['auth_user']['id'];
        $param = [$id];
        $sql = "SELECT COUNT(uaId) as id FROM useranswers WHERE userId = ?";
        return $this->exStatment($sql, $param);
    }

    public function correctAnswers()
    {
        $id = $_SESSION['auth_user']['id'];
        $param = [$id, 1];
        $sql = "SELECT COUNT(uaId) as id FROM useranswers WHERE userId = ? AND score = ?";
        return $this->exStatment($sql, $param);
    }

    public function topUsers()
    {
        $sql = "SELECT SUM(score) as scores ,MAX(attemptDate) as date ,fullName,country FROM useranswers INNER JOIN users ON uId = userId GROUP BY userId HAVING MAX(score) LIMIT 10";
        return $this->exStatment($sql);
    }

    public function myRank()
    {
        $id = $_SESSION['auth_user']['id'];
    }
}
