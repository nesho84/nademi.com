<?php

class Model extends Database
{
    private $stmt;

    public function __construct()
    {
        // Get PDO object from the parent Class
        parent::__construct();
    }

    /**
     * selectAll
     * @param string $sql query
     * @param array $bindValuesArray the Parameters to bind
     * @param constant $pdoFetchMode a PDO Fetch mode
     * @return mixed
     */
    public function selectAll($sqlQuery, $bindValuesArray = [], $pdoFetchMode = PDO::FETCH_ASSOC)
    {
        $this->stmt = $this->db->prepare($sqlQuery);

        foreach ($bindValuesArray as $key => $value) {
            $this->stmt->bindValue("$key", $value);
        }

        $this->stmt->execute();

        if ($this->stmt->rowCount() > 0) {
            return $this->stmt->fetchAll($pdoFetchMode);
        } else {
            return false;
        }
    }

    /**
     * selectOne
     * @param string $sql query
     * @param array $bindValuesArray the Parameters to bind
     * @param constant $pdoFetchMode a PDO Fetch mode
     * @return mixed
     */
    public function selectOne($sqlQuery, $bindValuesArray = [], $pdoFetchMode = PDO::FETCH_ASSOC)
    {
        $this->stmt = $this->db->prepare($sqlQuery);

        foreach ($bindValuesArray as $key => $value) {
            $this->stmt->bindValue("$key", $value);
        }

        $this->stmt->execute();

        if ($this->stmt->rowCount() > 0) {
            return $this->stmt->fetch($pdoFetchMode);
        } else {
            return false;
        }
    }

    /**
     * insert
     * @param string $table name of table to insert into
     * @param array $postData the Parameters to bind
     * @return bool true or false
     */
    public function insert($table, $postData)
    {
        $fieldNames = implode('`,`', array_keys($postData));
        $fieldValues = ':' . implode(', :', array_keys($postData));

        $this->stmt = $this->db->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($postData as $key => $value) {
            $this->stmt->bindValue(":$key", $value);
        }

        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }

        // echo "<pre>";
        // print_r($fieldValues);

        /**
         * Example
         */
        // $sql = "INSERT INTO tablename 
        //         (fieldName,fieldUserID,fieldDescription)
        //         VALUES (:fieldName, :fieldUserID, :fieldDescription)";
        // $stmt = $db->prepare($sql);
        // $stmt->bindParam(":fieldName", $fieldName);
        // $stmt->bindParam(":fieldUserID", $fieldUserID);
        // $stmt->bindParam(":fieldDescription", $fieldDescription);
        // $stmt->execute();
    }

    /**
     * update
     * @param string $table name of table to update
     * @param array $postData the Parameters to bind
     * @param string $where the WHERE query part
     * @return bool true or false
     */
    public function update($table, $postData, $where)
    {
        $fieldDetails = null;
        foreach ($postData as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $this->stmt = $this->db->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($postData as $key => $value) {
            $this->stmt->bindValue(":$key", $value);
        }

        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }

        // echo "<pre>";
        // echo "Tablename: " . $table . "<br>";
        // echo "Posted Data: <br>";
        // print_r($fieldDetails);
        // echo "Where string: " . $where . "<br>";

        /**
         * Example
         */
        // $sql = "UPDATE tablename SET
        // fieldName=:fieldName, 
        // fieldDescription=:fieldDescription
        // WHERE fieldID=:fieldID AND fieldUserID=:fieldUserID
        // ";
        // $stmt = $db->prepare($sql);
        // $stmt->bindParam(":fieldID", $fieldID);
        // $stmt->bindParam(":fieldName", $fieldName);
        // $stmt->bindParam(":fieldUserID", $fieldUserID);
        // $stmt->bindParam(":fieldDescription", $fieldDescription);
        // $stmt->execute();
    }

    /**
     * DELETE
     * @param string $table name of table to delete
     * @param array $postData the Parameters to bind
     * @param string $where the WHERE query part
     * @return bool true or false
     */
    public function delete($table, $postData, $where)
    {
        $this->stmt = $this->db->prepare("DELETE FROM $table WHERE $where");

        foreach ($postData as $key => $value) {
            $this->stmt->bindValue(":$key", $value);
        }

        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }

        // return true;
        // echo "Tablename: " . $table;
        // echo "Posted Data: ";
        // print_r($postData);
        // echo "Where string: " . $where;

        /**
         * Example
         */
        // $sql = "DELETE FROM tablename
        // WHERE fieldID=:fieldID";
        // $stmt = $db->prepare($sql);
        // $stmt->bindParam(":fieldID", $fieldID);
        // $stmt->execute();
    }
}
