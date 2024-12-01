<?php

class Message extends Database
{

    public function index()
    {
        $sql = "SELECT * FROM message ORDER BY mId DESC";
        return $this->exStatment($sql);
    }

    public function add($formData)
    {
        $data = Sanitizer::sanitize($formData);
        $sql = "INSERT INTO message (senderName,senderEmail,message) VALUES (?,?,?)";
        $params = [
            $data['name'],
            $data['email'],
            $data['message']
        ];
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'You can\'t send message please try agin later.');
            header('location:contact');
            die;
        }
        Semej::set('success', '', 'You message send.');
        header('location:contact');
        die;
    }

    public function single($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "SELECT * FROM message WHERE mId = ?";
        $result = $this->exStatment($sql, $param);
        return $result[0];
    }

    public function update($formData, $id)
    {
        $id = (int) $id;
    }

    public function delete($id)
    {
        $id = (int) $id;
        $sql = "DELETE FROM message WHERE mId = ?";
        $param = [$id];
        $result = $this->exStatment($sql, $param);
        if ($result == 0) {
            Semej::set('danger', '', 'Message deleting faild please try agin later.');
            header('location:dashboard?page=message');
            die;
        }
        Semej::set('success', '', 'Message successfully deleted.');
        header('location:dashboard?page=message');
        die;
    }
}
