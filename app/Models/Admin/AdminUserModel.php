<?php

class AdminUserModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsers()
    {
        return $this->selectAll(
            "SELECT * FROM user
            ORDER BY userDate DESC"
        );
    }

    public function getUserById($userID)
    {
        return $this->selectOne("SELECT * FROM user WHERE userID=:userID", ['userID' => $userID]);
    }

    public function getUserByEmail($userEmail)
    {
        return $this->selectOne("SELECT * FROM user WHERE userEmail=:userEmail", ['userEmail' => $userEmail]);
    }

    public function addUser($postData)
    {
        # if data inserted will return true else false
        return $this->insert('user', $postData);
    }

    public function updateUser($postData)
    {
        # if data updated will return true else false
        return $this->update('user', $postData, "`userID` = '{$postData['userID']}'");
    }

    public function deleteUser($postData)
    {
        # if data deleted will return true else false
        return $this->delete('user', $postData, "`userID` = '{$postData['userID']}'");
    }
}
