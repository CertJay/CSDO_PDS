<?php
session_start();
require_once 'config/dbconnect.php';
require_once 'components/User.php';

$userObj = new User();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $user = $userObj->check_login($email, $password);

    if ($user) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["email"] = $user["email"];
        $_SESSION["role"] = $user["role"];

        switch ($user["role"]) {
            case 'super_admin':
                header("Location: super_admin_dashboard.php");
                break;
            case 'admin':
                header("Location: admin_dashboard.php");
                break;
            case 'user':
                header("Location: user_dashboard.php");
                break;
            default:
                echo "Unknown role.";
        }
        exit;
    } else {
        $_SESSION["message"] = "Invalid email or password";
        header("Location: index.php");
        exit;
    }
}
