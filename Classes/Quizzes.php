<?php

class Quizzes extends Database
{

    public function index()
    {
        $sql = "SELECT  qId,question,title,type FROM questions INNER JOIN quizcatagory ON catagoryId = cId INNER JOIN quiztype ON tId = typeId ORDER BY tId DESC";
        return $this->exStatment($sql);
    }

    public function show($id)
    {
        $id = (int) $id;
        $question = 'question,correctAnswer,timeLimit,catagoryId,typeId,questions.create_at';
        $sql = "SELECT $question,fullName,title,type FROM questions INNER JOIN users ON uId = create_by INNER JOIN quizcatagory ON catagoryId = cId INNER JOIN quiztype ON tId = typeId WHERE qId = ?";
        $param = [$id];
        $result = $this->exStatment($sql, $param);
        return $result[0];
    }

    public function add($formData, $formAnswer)
    {
        $data = Sanitizer::sanitize($formData);
        $userId = $_SESSION['auth_user']['id'];
        $params = [
            $data['question'],
            $data['Crrect'],
            $data['time'],
            $data['catagory'],
            $data['type'],
            $userId
        ];
        $sql = "INSERT INTO questions (question,correctAnswer,timeLimit,catagoryId,typeId,create_by) VALUES (?,?,?,?,?,?)";
        $result = $this->exStatment($sql, $params);
        if ($result) {
            $lastId = $this->lastInsertedId();
            $ans = new Answer;
            $Answer = $ans->add($formAnswer, $lastId);
            if (!$Answer) {
                $this->deleteFaildQuestion($lastId);
                Semej::set('danger', '', 'Question Insert faild please try agin later.');
                header('location:dashboard?page=addquestion');
                die;
            } else {
                Semej::set('success', '', 'Question Insert successfull compeleted.');
                header('location:dashboard?page=addquestion');
                die;
            }
        } else {
            Semej::set('danger', '', 'Question Insert faild please try agin later.');
            header('location:dashboard?page=addquestion');
            die;
        }
    }

    public function single($id)
    {
        $id = (int) $id;
        $sql = "SELECT  qId,question,title,type FROM questions INNER JOIN quizcatagory ON catagoryId = cId INNER JOIN quiztype ON tId = typeId ORDER BY tId DESC";
        return $this->exStatment($sql);
    }

    public function update($formData, $formAnswer,  $id)
    {
        $id = (int) $id;
        $data = Sanitizer::sanitize($formData);
        $ans = new Answer;
        $answerResult = $ans->update($formAnswer, $id);
        if (!$answerResult) {
            Semej::set('danger', '', 'Question update faild please try agin later.');
            header('location:dashboard?page=updatequestion&qid=' . $id);
            die;
        }
        $params = [
            $data['question'],
            $data['correct'],
            $data['time'],
            $data['catagoryId'],
            $data['typeId'],
            $id
        ];
        $sql = "UPDATE questions SET question = ? , correctAnswer = ? , timeLimit = ? , catagoryId = ? , typeId = ?, update_at = NOW() WHERE qId = ?";
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Question update faild please try agin later.');
            header('location:dashboard?page=updatequestion&qid=' . $id);
            die;
        }
        Semej::set('success', '', 'Question update successfull compeleted.');
        header('location:dashboard?page=quizzes');
        die;
    }

    public function deleteFaildQuestion($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "DELETE FROM questions WHERE qId = ?";
        $this->exStatment($sql, $param);
    }

    public function delete($id)
    {
        $id = (int) $id;
        $sql = "DELETE FROM questions WHERE qId = ?";
        $param = [$id];
        $result = $this->exStatment($sql, $param);
        if ($result == 0) {
            Semej::set('danger', '', 'Question deleting faild please try agin later.');
            header('location:dashboard?page=quizzes');
            die;
        }
        Semej::set('success', '', 'Question successfully deleted.');
        header('location:dashboard?page=quizzes');
        die;
    }

    public function totleQuiz()
    {
        $sql = "SELECT COUNT(qId) as id FROM questions";
        return $this->exStatment($sql);
    }
}
