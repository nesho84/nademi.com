<?php

class AdminLoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findByEmail($email)
    {
        return $this->selectOne("SELECT * FROM user WHERE userEmail=:email", ['email' => $email]);
    }
}
