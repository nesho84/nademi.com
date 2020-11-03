<?php

class UserProjectModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getProjects($limit = null)
    {
        return $this->selectAll(
            "SELECT * FROM projekt 
            INNER JOIN category ON projektCategoryID=categoryID
            WHERE projektStatus=1
            ORDER BY projektCompletionDate DESC
            $limit"
        );
    }

    public function getProjectById(int $id)
    {
        return $this->selectOne(
            "SELECT * FROM projekt 
            INNER JOIN category ON projektCategoryID=categoryID
            WHERE projektID = $id"
        );
    }

    public function getCategories()
    {
        return $this->selectAll("SELECT * FROM category");
    }

    // Filter by User input
    public function getProjectBySeachInput($searchInput)
    {
        if ($searchInput) {
            $sql = "SELECT * FROM projekt 
            INNER JOIN category ON projektCategoryID=categoryID
            WHERE projektTitle LIKE :searchInput";

            return $this->selectAll($sql, ['searchInput' => $searchInput]);
        }
    }

    // Filter by date or by Title
    public function getProjectBySortBy($sortBy)
    {
        if ($sortBy) {
            $order = "";
            $sortBy == "projektCompletionDate" ? $order = "DESC" : $order == "ASC";

            $sql = "SELECT * FROM projekt 
            INNER JOIN category ON projektCategoryID=categoryID
            ORDER BY $sortBy $order";

            return $this->selectAll($sql);
        }
    }

    // Filter by selected Category
    public function getProjectBySelectedCategory($selectedCategory)
    {
        if ($selectedCategory) {
            $sql = "SELECT * FROM projekt 
                    INNER JOIN category ON projektCategoryID=categoryID
                    WHERE projektCategoryID = $selectedCategory";

            return $this->selectAll($sql);
        }
    }
}
