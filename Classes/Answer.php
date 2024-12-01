<?php

class Answer extends Database
{

    public function index() {}

    public function add($formData, $id)
    {
        $id = (int) $id;
        $data = Sanitizer::sanitize($formData);
        if ($data['answer1'] == '' || $data['answer2'] == '') {
            return false;
        }
        $params = [
            $data['answer1'],
            $data['answer2'],
        ];
        if ($data['answer3'] != '' && $data['answer3'] != ' ') {
            $params[] = $data['answer3'];
        }
        if ($data['answer4'] != '' && $data['answer4'] != ' ') {
            $params[] = $data['answer4'];
        }
        $sql = "INSERT INTO answers (answer,questionId) VALUES (?,?)";
        foreach ($params as $key => $value):
            $param = [$value, $id];
            $resultAnswer = $this->exStatment($sql, $param);
        endforeach;
        return $resultAnswer;
    }

    public function single($id)
    {
        $param = [$id];
        $sql = "SELECT answer FROM answers WHERE questionId = ?";
        return $this->exStatment($sql, $param);
    }

    public function update($formData, $id)
    {
        $id = (int) $id;
        $data = Sanitizer::sanitize($formData);
        if ($data['answer1'] == '' || $data['answer2'] == '') {
            return false;
        }
        $params = [
            $data['answer1'],
            $data['answer2'],
        ];
        if ($data['answer3'] != '' && $data['answer3'] != ' ') {
            $params[] = $data['answer3'];
        }
        if ($data['answer4'] != '' && $data['answer4'] != ' ') {
            $params[] = $data['answer4'];
        }
        $checkSql = "SELECT aId FROM answers WHERE questionId = ?";
        $checkParam = [$id];
        $checkResult = $this->exStatment($checkSql, $checkParam);
        if (count($checkResult) != 0) {
            $deleteResult = $this->delete($id);
            if (!$deleteResult) {
                return false;
            }
        }
        $sql = "INSERT INTO answers (answer,questionId) VALUES (?,?)";
        foreach ($params as $key => $value):
            $param = [$value, $id];
            $resultAnswer = $this->exStatment($sql, $param);
        endforeach;
        return $resultAnswer;
    }

    public function delete($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "DELETE FROM answers WHERE questionId = ?";
        return $this->exStatment($sql, $param);
    }
}
