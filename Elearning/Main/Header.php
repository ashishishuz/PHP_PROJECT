<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap Css -->
    <link rel='stylesheet' href='Css/bootstrap.min.css'>
    <!-- Font Awesome Css -->
    <link rel='stylesheet' href='Css/all.min.css'>
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link rel='stylesheet' href='Css/style.css'>

    <title>Elearning</title>
</head>
<body>
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-md navbar-dark pl-5 fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyPathshala</a>
            <span class='navbar-text'>Learn and Implement</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav custom-nav pl-5">
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="Courses.php">Courses</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="Payment.php">Payment Status</a>
                    </li>
                    <!-- if loggedin then myprofile & logout button option  -->
                    <?php 
                    session_start();
                    if(isset($_SESSION['is_login'])){
                        echo ' <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="Student/StudentProfile.php">My Profile</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>';
                    }
                    // if not logged in then option to regiter/login
                    else{
                        echo ' <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#stuLoginModal">Login</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#stuRegModal" href="#">Register</a>
                    </li>';
                    }
                    ?>
                
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="#">Feedback</a>
                    </li>
                    <li class="nav-item custom-nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navigation --> 
