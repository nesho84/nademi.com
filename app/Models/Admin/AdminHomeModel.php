<?php

class AdminHomeModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getTables()
    {
        return $this->selectAll(
            "SELECT table_name, table_rows 
            FROM information_schema.tables 
            WHERE table_schema = '" . DB_NAME . "'
            ORDER BY table_name"
        );
    }
}
