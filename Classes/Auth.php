<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once 'Sanitizer.php';

class Auth extends  Database
{

    public function checkCookie()
    {
        if (isset($_COOKIE['authTokenQ'])) {

            $result = $this->validateCookie();
            if (!$result) {
                return false;
            }
            $cookie = $_COOKIE['authTokenQ'];
            $cookie = hex2bin($cookie);
            $explode = explode(',', $cookie);
            $username = $explode[0];
            $token = $this->generateToken($username);
            $_SESSION['auth_token'] = $token;
            header("location:dashboard?page=home");
            die;
        }
    }
    public function login($formData)
    {
        $data = Sanitizer::sanitize($formData);
        $email = $data['email'];
        $pas = md5(SALT . $data['password']);
        $sql = "";
        $params = [
            $email,
            $pas
        ];
        if (strpos($email, "@")) {
            $sql = "SELECT uid, username, email,password,role FROM users WHERE email = ? AND password = ?";
        } else {
            $sql = "SELECT uid, username,password,role FROM users WHERE username = ? AND password =?";
        }
        $result = $this->exStatment($sql, $params);
        if (!count($result) == 1) {
            Semej::set("danger", "", "user and password not match.");
            header("location:signIn");
            die;
        }
        Semej::set("success", "", "Login successfully.");
        $result = $result['0'];
        $_SESSION['auth_user'] = [
            "id" => $result->id,
            "user" => $result->username,
            "role" => $result->role

        ];
        $token = $this->generateToken($result->username);
        $_SESSION['auth_token'] = $token;
        if (isset($formData['remember'])) {
            $username = $result->username;
            $userAgent = $_SERVER['HTTP_USER_AGENT'];
            $agentUser = $username . "," . $userAgent;
            $cookie = bin2hex($agentUser);
            setcookie("authTokenQ", $cookie, time() + 2592000, "/", "", false, true);
        }
        header("location:dashboard?page=home");
    }
    public function generateToken($auth_user)
    {
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        return sha1(SALT . $auth_user . $user_agent);
    }
    public function validateToken()
    {
        if (!isset($_SESSION)) {
            return false;
        }
        if (!isset($_SESSION['auth_token']) && isset($_SESSION['auth_user'])) {
            return false;
        }
        $username = $_SESSION['auth_user']['user'];
        $generateTok = $this->generateToken($username);
        $token = $_SESSION['auth_token'];
        if ($token != $generateTok) {
            return false;
        }
        return true;
    }
    public function validateCookie()
    {
        if (!isset($_COOKIE['authTokenQ'])) {
            return false;
        }
        $cookie = $_COOKIE['authTokenQ'];
        $username = hex2bin($cookie);
        $explode = explode(",", $username);
        $username = $explode[0];
        $agentUser = $username . "," . $_SERVER['HTTP_USER_AGENT'];
        $generateCookie = bin2hex($agentUser);
        if ($cookie !== $generateCookie) {
            return false;
        }
        $sql = "SELECT id,username,role  FROM users WHERE username = ?";
        $params = [
            $username
        ];
        $result = $this->exStatment($sql, $params);
        if (count($result) != 1) {
            return false;
        }
        $result = $result[0];
        $_SESSION['auth_user'] = [
            'id' => $result->id,
            'user' => $result->username,
            'role' => $result->role
        ];
        return true;
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        setcookie("authTokenQ", "", time() - 2592000, "/", "", false, true);
        header("location:signin");
    }
}
