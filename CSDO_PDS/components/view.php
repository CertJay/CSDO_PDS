<?php
function login()
{
    echo
    '
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


';
}



function adminDashboard()
{
    echo
    '
<body class="flex h-screen bg-purple-100">
    <!-- Sidebar -->
    <div id="sidebar" class="w-64 bg-white h-full shadow-lg p-5 transition-transform transform translate-x-0">
        <h2 class="text-2xl font-bold text-purple-600">Admin Panel</h2>
        <ul class="mt-5 space-y-4">
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Dashboard</li>
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Users</li>
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Products</li>
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Orders</li>
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Settings</li>
            <li class="text-gray-700 hover:text-purple-600 cursor-pointer">Reports</li>
        </ul>
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow-md p-4 flex justify-between items-center">
            <button id="toggleSidebar" class="text-purple-600 text-2xl">&#9776;</button>
            <h1 class="text-xl font-bold text-purple-600">Admin Dashboard</h1>
            <div class="flex items-center space-x-4">
                <img src="https://via.placeholder.com/40" class="rounded-full" alt="User Avatar">
                <button class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Logout</button>
            </div>
        </nav>
        
        <!-- Content Area -->
        <div class="flex-1 p-6">
            <h2 class="text-2xl font-bold text-gray-800">Welcome to the Admin Dashboard</h2>
            <p class="text-gray-600 mt-2">This is a placeholder content area. Customize as needed.</p>
        </div>
    </div>

    <script>
        document.getElementById("toggleSidebar").addEventListener("click", function () {
            const sidebar = document.getElementById("sidebar");
            sidebar.classList.toggle("-translate-x-64");
        });
    </script>
    
    ';
}

function signup()
{
    echo '
<body class="flex items-center justify-center bg-purple-100">

    <div class="bg-white p-8 rounded-lg h-full shadow-lg w-96">
    <img src="assets/logo.jpg" alt="logo">
        <h2 class="text-2xl font-bold text-purple-600 text-center">Register</h2>
        <form method="POST" action="register.php" class="mt-4">
            <div class="mb-4">
            
                <input type="text" placeholder="Your Name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="mb-4">
          
                <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="mb-4">
                
                <input type="password" id="password" placeholder="Your Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="mb-4">
                
                <input type="password" id="confirmPassword" placeholder="Confirm Your Password" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" id="showPassword" class="mr-2">
                <label for="showPassword" class="text-gray-700">Show Password</label>
            </div>
            <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">Register</button>
            <div class="flex justify-center mt-4">
    <p class="text-gray-600 text-center text-xs">
        Already have an account? 
        <a href="index.php" class="text-purple-600 hover:text-purple-500">Log in</a>
    </p>
</div>
        </form>
    </div>

    <script>
        document.getElementById("showPassword").addEventListener("change", function () {
            const passwordField = document.getElementById("password");
            const confirmPasswordField = document.getElementById("confirmPassword");
            const type = this.checked ? "text" : "password";
            passwordField.type = type;
            confirmPasswordField.type = type;
        });
    </script>
        ';
}



function forgotPassword()
{
    echo '
   <body class="bg-purple-100 min-h-screen flex flex-col">
    <nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
        <h1 class="text-purple-600 text-xl font-bold">MyApp</h1>
        <form class="flex space-x-4">
            <input type="email" placeholder="Your Email" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <input type="password" placeholder="Your Password" class="px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">Log In</button>
        </form>
    </nav>
    <div class="flex items-center justify-center flex-grow">
        <div class="bg-white p-8 rounded-lg shadow-lg w-96">
            <h2 class="text-2xl font-bold text-purple-600 text-center">Forgot Password</h2>
            <p class="text-gray-600 text-center mt-2">Enter your email to search for your account.</p>
            <form class="mt-4">
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" placeholder="Your Email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500">
                </div>
                <button type="submit" class="w-full bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">Search</button>
                <a href="index.php" class="mt-4 w-full bg-gray-200 text-[#24252B] py-2 rounded-lg block text-center">Return</a>
            </form>
        </div>
    </div>
    
    
    ';
}
