<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'components/head.php';
    ?>
    <?php

    require_once 'config/dbconnect.php'; // Include the database connection file
    require_once 'components/auth.php'; // Include the auth functions
    require_once 'components/User.php'; // Include the User class file
    require_once 'components/view.php'; // Include the view functions
    ?>

</head>

<body>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);
        $confirm_password = trim($_POST["confirm_password"]);

        if ($password !== $confirm_password) {
            echo "<script>alert('Passwords do not match!'); window.location.href='signup.php';</script>";
            exit;
        }

        // Check if the email is already registered
        $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute(["email" => $email]);

        if ($stmt->fetch()) {
            echo "<script>alert('Email is already registered!'); window.location.href='signup.php';</script>";
            exit;
        }

        // Hash password before saving
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert user into database
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:name, :email, :password, 'user')");
        $result = $stmt->execute([
            "name" => $name,
            "email" => $email,
            "password" => $hashed_password
        ]);

        if ($result) {
            echo "<script>alert('Registration successful! Please log in.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Registration failed. Try again.'); window.location.href='signup.php';</script>";
        }
    }
    ?>

    <?php
    signup();

    ?>
</body>

</html>