<?php

const  SALT = "4ACFE3202A5FF5CF467898FC58AAB1D615029441";

class Database
{

    private $host = 'localhost';
    private $dbname =  'quizdb';
    private $user = 'root';
    private $pass = '';
    protected $con;

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (Exception $e) {
            echo "We can't connect to server pleace chick the erorr and try agin later  ===>" . $e->getMessage();
        }
    }
    public function __destruct()
    {
        $this->con = null;
    }
    public function exStatment($sql, $params = [])
    {
        try {
            $stmt = $this->con->prepare($sql);
            if (!empty($params)) {
                foreach ($params as $key => $param) {
                    $stmt->bindValue($key + 1, $param, PDO::PARAM_STR);
                }
            }
            $stmt->execute();
            if (str_starts_with($sql, "SELECT") || str_starts_with($sql, "SHOW")) {
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            } else {
                $result = $stmt->rowCount();
            }
            return $result;
        } catch (Exception $e) {
            return "Server error" . $e->getMessage();
        }
    }
    public function lastInsertedId()
    {
        return $this->con->lastInsertId();
    }
}
$db = new Database;
