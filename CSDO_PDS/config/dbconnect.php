<?php
class dbconnection
{
    protected $connection;

    public function __construct()
    {
        $host = "localhost";
        $dbname = "dbpdf";
        $username = "root";
        $password = "";

        try {
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}
