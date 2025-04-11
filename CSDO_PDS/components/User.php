<?php
require_once 'config/dbconnect.php';

class User extends dbconnection
{
    public function __construct()
    {
        parent::__construct();
    }

    public function check_login($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // NOTE: Use password_verify if hashed
        if ($user && $password === $user['password']) {
            return $user;
        }
        return false;
    }

    public function getUserDetailsById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
