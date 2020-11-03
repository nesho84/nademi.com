<?php

class ApiProjectModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    // Projects
    public function getProjects($limit = null)
    {
        return $this->selectAll("SELECT * FROM projekt $limit");
    }

    public function getProjectById(int $id)
    {
        return $this->selectOne(
            "SELECT * FROM projekt WHERE projektID = $id"
        );
    }

    // Categories
    public function getCategories()
    {
        return $this->selectAll("SELECT * FROM category");
    }

    public function getCategoryById(int $id)
    {
        return $this->selectOne(
            "SELECT * FROM category WHERE categoryID = $id"
        );
    }

    // Users
    public function getUsers()
    {
        return $this->selectAll("SELECT * FROM user");
    }

    public function getUserById(int $id)
    {
        return $this->selectOne(
            "SELECT * FROM user WHERE userID = $id"
        );
    }

    public function findByEmail($email)
    {
        return $this->selectOne("SELECT * FROM user WHERE userEmail=:email", ['email' => $email]);
    }
}
