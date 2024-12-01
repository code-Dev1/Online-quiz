<?php

class User extends Database
{
    public function index()
    {
        $sql = "SELECT * FROM users";
        return $this->exStatment($sql);
    }

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

    public function add($formData)
    {

        $data = Sanitizer::sanitize($formData);
        $role = $_SESSION['auth_user']['role'];
        if ($role !== 'admin') {
            return false;
        }
        if (empty($data)) {
            Semej::set('danger', '', 'Please frist complete form');
            header('location:dashboard?page=users');
            die;
        }
        if ($data['password'] !== $data['confirm']) {
            Semej::set('danger', '', 'Passwords are not match');
            header('location:dashboard?page=users');
            die;
        }
        $checkEmail = "SELECT email FROM users WHERE email = ?";
        $emailParam = [$data['email']];
        $emailResult = $this->exStatment($checkEmail, $emailParam);

        if (!empty($emailResult)) {
            Semej::set('danger', '', 'This email already exists');
            header('location:dashboard?page=users');
            die;
        }

        $checkUsername = "SELECT username FROM users WHERE username = ?";
        $userParam = [$data['username']];
        $userResult = $this->exStatment($checkUsername, $userParam);

        if (!empty($userResult)) {
            Semej::set('danger', '', 'This username already exists');
            header('location:dashboard?page=users');
            die;
        }

        $password = md5(SALT . $data['password']);
        $params = [
            $data['name'],
            $data['userName'],
            $data['email'],
            $data['country'],
            $password,
            $data['role']
        ];
        $sql = "INSERT INTO users (fullName,userName,email,country,password,roels) VALUES (?,?,?,?,?,?)";
        $result = $this->exStatment($sql, $params);
        if ($result != 1) {
            Semej::set('danger', '', 'User registertion failed please try agin later.');
            header('location:dashboard?page=users');
            die;
        }
        Semej::set('success', '', 'User registertion successfullly completed.');
        header('location:dashboard?page=users');
        die;
    }

    public function role()
    {

        $sql = "SHOW COLUMNS FROM users LIKE 'role'";
        $result = $this->exStatment($sql);
        $enum = $result[0];
        $role = $enum->Type;
        preg_match("/^enum\(\'(.*)\'\)$/", $role, $matches);
        return explode("','", $matches[1]);
    }

    public function single()
    {
        $id = $_SESSION['auth_user']['id'];
        $id = (int) $id;
        $param = [$id];
        $sql = "SELECT * FROM users WHERE uId = ?";
        $result = $this->exStatment($sql, $param);
        return $result[0];
    }

    public function singleById($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "SELECT * FROM users WHERE uId = ?";
        $result = $this->exStatment($sql, $param);
        return $result[0];
    }

    public function update($formData)
    {
        $data = Sanitizer::sanitize($formData);
        $id = $_SESSION['auth_user']['id'];
        $id = (int) $id;
        $params = [
            $data['name'],
            $data['userName'],
            $data['email'],
            $data['country'],
            $id
        ];
        $sql = "UPDATE users SET fullName = ? , userName = ? , email = ? ,country = ?, update_at = NOW() WHERE uId = ?";
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Profile not update please try agin later.');
            header('location:dashboard?page=updateprofile');
            die;
        }
        Semej::set('success', '', 'Profile updated successfully completed.');
        header('location:dashboard?page=profile');
        die;
    }

    public function updateById($formData, $id)
    {
        $data = Sanitizer::sanitize($formData);
        $id = (int) $id;
        $params = [
            $data['name'],
            $data['userName'],
            $data['email'],
            $data['country'],
            $data['role'],
            $id
        ];
        $sql = "UPDATE users SET fullName = ? , userName = ? , email = ? ,country = ?, role = ? , update_at = NOW() WHERE uId = ?";
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Profile not update please try agin later.');
            header('location:dashboard?page=users');
            die;
        }
        Semej::set('success', '', 'Profile updated successfully completed.');
        header('location:dashboard?page=users');
        die;
    }

    public function changePass($formData)
    {
        $data = Sanitizer::sanitize($formData);
        $id = $_SESSION['auth_user']['id'];
        $id = (int) $id;
        $checkPassSql = "SELECT password FROM users WHERE uId = ?";
        $pssParam = [$id];
        $passResult = $this->exStatment($checkPassSql, $pssParam);
        $pass = $passResult[0];
        $password = md5(SALT . $data['oldPass']);
        if ($password !== $pass->password) {
            Semej::set('danger', '', 'Your old not crrect');
            header('location:dashboard?page=changepass');
            die;
        }
        if ($data['newPass'] !== $data['confrim']) {
            Semej::set('danger', '', 'Your password not match.');
            header('location:dashboard?page=changepass');
            die;
        }
        $newPss = md5(SALT . $data['newPass']);
        $params = [$newPss, $id];
        $sql = "UPDATE users SET password = ? WHERE uId";
        $result = $this->exStatment($sql, $params);
        if (!$result) {
            Semej::set('danger', '', 'Password not update please try agin later.');
            header('location:dashboard?page=changepass');
            die;
        }
        Semej::set('success', '', 'Password updated successfully completed.');
        header('location:dashboard?page=profile');
        die;
    }

    public function delete()
    {
        $id = $_SESSION['auth_user']['id'];
        $param = [$id];
        $sql = "DELETE FROM users WHERE uId = ?";
        $result = $this->exStatment($sql, $param);
        if (!$result) {
            Semej::set('danger', '', 'Acount deleting faild please try agin later.');
            header('location:dashboard?page=profile');
            die;
        }
        $auth = new Auth;
        $auth->logout();
    }
    public function deleteById($id)
    {
        $id = (int) $id;
        $param = [$id];
        $sql = "DELETE FROM users WHERE uId = ?";
        $result = $this->exStatment($sql, $param);
        if (!$result) {
            Semej::set('danger', '', 'Acount deleting faild please try agin later.');
            header('location:dashboard?page=profile');
            die;
        }
        Semej::set('success', '', 'User deleted successfully compeleted.');
        header('location:dashboard?page=users');
        die;
    }

    public function totleUser()
    {

        $sql = "SELECT COUNT(uId) as id FROM users WHERE role = 'user'";
        return $this->exStatment($sql);
    }

    public function totleTeacher()
    {

        $sql = "SELECT COUNT(uId) as id FROM users WHERE role = 'teacher'";
        return $this->exStatment($sql);
    }
}
