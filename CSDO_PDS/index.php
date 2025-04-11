<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once 'config/dbconnect.php';
require_once 'components/auth.php';
require_once 'components/User.php';
?>

<head>
    <?php
    include 'components/head.php';
    ?>

</head>

<body>


    <body class="flex items-center justify-center h-screen bg-purple-100">
        <div class="bg-[white] p-8 rounded-2xl shadow-lg w-96">
            <img src="assets/logo.jpg" alt="logo">
            <h2 class="text-2xl font-bold text-purple-600 text-center mb-4">Login</h2>
            <form method="POST" action="login.php">
                <div class="mb-4">

                    <input type="email" placeholder="Enter your email" id="email" name="email"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4">

                    <input type="password" id="password" placeholder="Enter your password" name="password"
                        class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <div class="mb-4 flex items-center">
                    <input type="checkbox" id="showPassword" class="mr-2">
                    <label for="showPassword" class="text-gray-700 text-sm">Show Password</label>
                </div>
                <button type="submit"
                    class="w-full bg-purple-600 text-white p-2 rounded-lg hover:bg-purple-700 transition">Login</button>

                <div class="mb-4 flex justify-center">
                    <a href="forgot_password.php" class="text-gray-600 hover:text-purple-500 text-center text-sm">
                        Forgot Password?
                    </a>
                </div>
                <hr>
                <div class="flex justify-center mt-4">
                    <p class="text-gray-600 text-center text-xs">
                        Don\'t have an account?
                        <a href="signup.php" class="text-purple-600 hover:text-purple-500">Sign up</a>
                    </p>
                </div>
            </form>
        </div>

        <script>
            document.getElementById("showPassword").addEventListener("change", function() {
                const passwordInput = document.getElementById("password");
                passwordInput.type = this.checked ? "text" : "password";
            });
        </script>






        <?php
        // adminDashboard()
        ?>
    </body>

</html>