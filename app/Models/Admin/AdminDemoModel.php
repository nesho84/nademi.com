<?php

class AdminDemoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDemos()
    {
        return $this->selectAll(
            "SELECT * FROM demo 
            INNER JOIN category ON demoCategoryID=categoryID
            INNER JOIN user ON demoUserID=userID
            ORDER BY demoDate DESC"
        );
    }

    public function getDemoById($id)
    {
        return $this->selectOne("SELECT * FROM demo WHERE demoID = $id");
    }

    public function addDemo($postData)
    {
        # if data inserted will return true else false
        return $this->insert('demo', $postData);
    }

    public function updateDemo($postData)
    {
        # if data updated will return true else returns false
        return $this->update('demo', $postData, "`demoID` = '{$postData['demoID']}' AND `demoUserID` = '{$_SESSION['userID']}'");
    }

    public function deleteDemo($postData)
    {
        # if data deleted will return true else false
        return $this->delete('demo', $postData, "`demoID` = '{$postData['demoID']}'");
    }
}
