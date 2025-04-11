<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['super_admin_id'])) {
    header("Location: index.php");
    exit;
}

include_once('components/User.php');

$user = new User();

// // Use correct session variable and column name
// $super_admin_id = $_SESSION['super_admin_id'];
// $sql = "SELECT * FROM super_admin WHERE super_admin_id = '$super_admin_id'";
// $row = $user->getAdminDetailsById($_SESSION['super_admin_id']);
// // Optional: Use the fetched data
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
</head>
<style>
    /*
    DEMO STYLE
*/

    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

    body {
        font-family: 'Poppins', sans-serif;
        background: #fafafa;
    }

    p {
        font-family: 'Poppins', sans-serif;
        font-size: 1.1em;
        font-weight: 300;
        line-height: 1.7em;
        color: #999;
    }

    a,
    a:hover,
    a:focus {
        color: inherit;
        text-decoration: none;
        transition: all 0.3s;
    }

    .navbar {
        padding: 15px 10px;
        background: #fff;
        border: none;
        border-radius: 0;
        margin-bottom: 40px;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    }

    .navbar-btn {
        box-shadow: none;
        outline: none !important;
        border: none;
    }

    .line {
        width: 100%;
        height: 1px;
        border-bottom: 1px dashed #ddd;
        margin: 40px 0;
    }

    /* ---------------------------------------------------
    SIDEBAR STYLE
----------------------------------------------------- */

    .wrapper {
        display: flex;
        width: 100%;
        align-items: stretch;
    }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #7386D5;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    #sidebar .sidebar-header {
        padding: 20px;
        background: #6d7fcc;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li a {
        padding: 10px;
        font-size: 1.1em;
        display: block;
    }

    #sidebar ul li a:hover {
        color: #7386D5;
        background: #fff;
    }

    #sidebar ul li.active>a,
    a[aria-expanded="true"] {
        color: #fff;
        background: #6d7fcc;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: #6d7fcc;
    }

    ul.CTAs {
        padding: 20px;
    }

    ul.CTAs a {
        text-align: center;
        font-size: 0.9em !important;
        display: block;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    a.download {
        background: #fff;
        color: #7386D5;
    }

    a.article,
    a.article:hover {
        background: #6d7fcc !important;
        color: #fff !important;
    }

    /* ---------------------------------------------------
    CONTENT STYLE
----------------------------------------------------- */

    #content {
        width: 100%;
        padding: 20px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    /* ---------------------------------------------------
    MEDIAQUERIES
----------------------------------------------------- */

    @media (max-width: 768px) {
        #sidebar {
            margin-left: -250px;
        }

        #sidebar.active {
            margin-left: 0;
        }

        #sidebarCollapse span {
            display: none;
        }
    }
</style>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>PDS</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="addprofile.php">Add Profile</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Grade
                        Level</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Grade 1</a>
                        </li>
                        <li>
                            <a href="#">Grade 2</a>
                        </li>
                        <li>
                            <a href="#">Grade 3</a>
                        </li>
                        <li>
                            <a href="#">Grade 4</a>
                        </li>
                        <li>
                            <a href="#">Grade 5</a>
                        </li>
                        <li>
                            <a href="#">Grade 6</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">High
                        School</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Grade 7</a>
                        </li>
                        <li>
                            <a href="#">Grade 8</a>
                        </li>
                        <li>
                            <a href="#">Grade 9</a>
                        </li>
                        <li>
                            <a href="#">Grade 10</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Senior
                        High School</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="#">Grade 11</a>
                        </li>
                        <li>
                            <a href="#">Grade 12</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Non-teaching Employee</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu1">
                        <li>
                            <a href="#">Grade 11</a>
                        </li>
                        <li>
                            <a href="#">Grade 12</a>
                        </li>
                    </ul>
                </li>

            </ul>


        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!--<div class="card" style="width: 18rem;">
  <img src="admin icon.png" class="card-img-top" alt="...">
  <div class="card-body">
    <p class="card-text">Welcome Admin</p>
  </div>
</div>-->

            <main class="show px-3 py-4">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h3 class="fw-bold fs-4 mb-3">
                            Good day <?php echo $row['name']; ?>! <br> Welcome to the PDS System
                        </h3>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <div class="card shadow">
                                    <div class="card-body py-4">
                                        <h6 class="mb-2 fw-bold ">Total Number of Records</h6>
                                        <p class="fw-bold mb-2">12345</p>
                                        <div class="mb-0"><span class="bagde text-success me-2">1%</span>
                                            <span class="fw-bold">aaaa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card shadow">
                                    <div class="card-body py-4">
                                        <h6 class="mb-2 fw-bold ">Total Number of Registered Students</h6>
                                        <p class="fw-bold mb-2">12345</p>
                                        <div class="mb-0"><span class="bagde text-success me-2">1%</span>
                                            <span class="fw-bold">aaaa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="card shadow">
                                    <div class="card-body py-4">
                                        <h6 class="mb-2 fw-bold ">Total Number of Registered Non - Teaching Staff</h6>
                                        <p class="fw-bold mb-2">12345</p>
                                        <div class="mb-0"><span class="bagde text-success me-2">1%</span>
                                            <span class="fw-bold">aaaa</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </main>

    </div>
    </div>
















    <script>
        $(document).ready(function() {
            $("#sidebarCollapse").on("click", function() {
                $("#sidebar").toggleClass("active");
            });
        });
    </script>




</body>

</html>