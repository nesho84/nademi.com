<?php

class AdminProjectModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProjects()
    {
        return $this->selectAll(
            "SELECT * FROM projekt 
            INNER JOIN category ON projektCategoryID=categoryID
            INNER JOIN user ON projektUserID=userID
            ORDER BY projektDate DESC"
        );
    }

    public function getProjectById($id)
    {
        return $this->selectOne("SELECT * FROM projekt WHERE projektID = $id");
    }

    public function addProject($postData)
    {
        # if data inserted will return true else false
        return $this->insert('projekt', $postData);
    }

    public function updateProject($postData)
    {
        # if data updated will return true else returns false
        return $this->update('projekt', $postData, "`projektID` = '{$postData['projektID']}' AND `projektUserID` = '{$_SESSION['userID']}'");
    }

    public function deleteProject($postData)
    {
        # if data deleted will return true else false
        return $this->delete('projekt', $postData, "`projektID` = '{$postData['projektID']}'");
    }
}
