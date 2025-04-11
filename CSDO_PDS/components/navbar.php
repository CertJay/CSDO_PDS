<!-- <script src="assets/js/sales.js"></script> -->
<nav class="navbar">
    <h2>City Schools Division Office of Dasmariñas - Personal Data Sheet</h2>
    <div class="user-menu">
        <button class="user-btn">
            <i class="fas fa-user-circle"></i>
            <span><?= htmlspecialchars($_SESSION['username']) ?></span>
            <i class="fas fa-chevron-down dropdown-icon"></i>
        </button>
        <div class="user-dropdown">
            <!-- <a href="dashboard.php?page=my_account" class="dropdown-item">
                <i class="fas fa-user"></i> My Account
            </a> -->
            <a href="logout.php" class="dropdown-item">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</nav>