<?php

class Database
{
    protected $dbHost = DB_HOST;
    protected $dbName = DB_NAME;
    protected $dbCharset = DB_CHARSET;
    protected $dbUser = DB_USER;
    protected $dbPw = DB_PASS;

    protected $db = null;

    public function __construct()
    {
        $this->db = $this->connect();
    }

    protected function connect()
    {
        try {
            $this->db = new PDO(
                "mysql:host=$this->dbHost;dbname=$this->dbName;charset=$this->dbCharset",
                "$this->dbUser",
                "$this->dbPw"
            );
            // error/exception mode to get a feedback
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $error = "<strong>Database Connection Failed with error:</strong> <br> " . $e->getMessage();
            echo "<div class='alert alert-danger text-center m-3' role='alert'><small>" . $error . "</small></div>";
        }

        return $this->db;
    }
}
