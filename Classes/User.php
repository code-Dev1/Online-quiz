<?php

class User extends Database
{

    public function registers($formData)
    {
        $data = Sanitizer::sanitize($formData);
        if (empty($data)) {
            Semej::set('danger', '', 'Please frist complete form');
            header('location:signUP');
            die;
        }
        if ($data['password'] !== $data['confirm']) {
            Semej::set('danger', '', 'Passwords are not match');
            header('location:signUP');
            die;
        }
        $checkEmail = "SELECT email FROM users WHERE email = ?";
        $emailParam = [$data['email']];
        $emailResult = $this->exStatment($checkEmail, $emailParam);

        if (!empty($emailResult)) {
            Semej::set('danger', '', 'This email already exists');
            header('location:signUP');
            die;
        }

        $checkUsername = "SELECT username FROM users WHERE username = ?";
        $userParam = [$data['username']];
        $userResult = $this->exStatment($checkUsername, $userParam);

        if (!empty($userResult)) {
            Semej::set('danger', '', 'This username already exists');
            header('location:signUP');
            die;
        }

        $password = md5(SALT . $data['password']);
        $params = [
            $data['name'],
            $data['username'],
            $data['email'],
            $password
        ];
        $sql = "INSERT INTO users (fullName,userName,email,password) VALUES (?,?,?,?)";
        $result = $this->exStatment($sql, $params);
        if ($result != 1) {
            Semej::set('danger', '', 'User registertion failed please try agin later.');
            header('location:signUP');
            die;
        }
        Semej::set('success', '', 'User registertion successfullly completed.');
        header('location:signIn');
        die;
    }
}
