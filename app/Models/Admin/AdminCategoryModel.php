<?php

class AdminCategoryModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories()
    {
        return $this->selectAll(
            "SELECT * FROM category
            INNER JOIN user 
            ON categoryUserID = userID
            ORDER BY categoryDate DESC"
        );
    }

    public function getCategoryById($categoryID)
    {
        return $this->selectOne("SELECT * FROM category WHERE categoryID = :categoryID", ['categoryID' => $categoryID]);
    }

    public function addCategory($postData)
    {
        # if data inserted will return true else false
        return $this->insert('category', $postData);
    }

    public function updateCategory($postData)
    {
        # if data updated will return true else false
        return $this->update('category', $postData, "`categoryID` = '{$postData['categoryID']}' AND `categoryUserID` = '{$_SESSION['userID']}'");
    }

    public function deleteCategory($postData)
    {
        # if data deleted will return true else false
        return $this->delete('category', $postData, "`categoryID` = '{$postData['categoryID']}'");
    }
}
