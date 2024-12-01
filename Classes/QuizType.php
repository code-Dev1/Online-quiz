<?php

class QuizType extends Database
{


    public function index()
    {
        $sql = "SELECT * FROM quiztype";
        return $this->exStatment($sql);
    }

    public function add($formData)
    {
        $data = Sanitizer::sanitize($formData);
        $param = [$data['type']];
        $sql = "INSERT INTO quiztype (type) VALUES (?)";
        $result = $this->exStatment($sql, $param);
        if (!$result) {
            Semej::set('danger', '', 'Insert data failed please try agin later.');
            return header('location:dashboard.php?page=quiztype');
            die;
        }
        Semej::set('success', '', 'Insert data successfully completed.');
        return header('location:dashboard.php?page=quiztype');
        die;
    }

    public function single($id)
    {
        $id = (int) $id;
        $sql = "SELECT * FROM quiztype WHERE tId = ?";
        $param = [$id];
        $result = $this->exStatment($sql, $param);
        return $result[0];
    }

    public function updata($formData, $id)
    {
        $id = (int) $id;
        $data = Sanitizer::sanitize($formData);
        $params = [
            $data,
            $id
        ];
        $sql = "UPDATE quiztype SET type = ? WHERE tId = ?";
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Quiz type updateing faild please try agin later.');
            header('location:dashboard?page=quiztype');
            die;
        }
        Semej::set('success', '', 'Quiz type successfully updated.');
        header('location:dashboard?page=quiztype');
        die;
    }

    public function delete($id)
    {
        $id = (int) $id;
        $sql = "DELETE FROM quiztype WHERE tId = ?";
        $param = [$id];
        $result = $this->exStatment($sql, $param);
        if ($result == 0) {
            Semej::set('danger', '', 'Quiz type deleting faild please try agin later.');
            header('location:dashboard?page=quiztype');
            die;
        }
        Semej::set('success', '', 'Quiz type successfully deleted.');
        header('location:dashboard?page=quiztype');
        die;
    }
}
