<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'super_admin') {
    header("Location: index.php");
    exit;
}

require_once 'components/User.php';
$user = new User();

$row = $user->getUserDetailsById($_SESSION['user_id']);
if (!$row) {
    echo "User not found.";
    exit;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Super Admin Dashboard</title>
</head>

<body>
    <h1>Welcome: <?php echo htmlspecialchars($row['email']); ?></h1>
</body>

</html>