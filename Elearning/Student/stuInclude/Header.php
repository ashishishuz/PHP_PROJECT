<?php
include_once(__DIR__ . '../../../dbConnection.php');

if(!isset($_SESSION)){
    session_start();
}

if(isset($_SESSION['is_login'])){
    $stuEmail = $_SESSION['stuLogMail'];
}

if(isset($stuEmail)){
    $sql = "SELECT stu_img FROM student WHERE stu_email='$stuEmail'";
    $res = $conn->query($sql);
    $row = $res->fetch_assoc();
    $stu_img = $row['stu_img'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT PROFILE</title>

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../Css/stustyle.css">
</head>
<body>

<!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow" style="background-color: #225470;">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="StudentProfile.php">MyPathshala</a>
</nav>

<!-- Side Bar -->
<div class="container-fluid mb-5" style="margin-top:40px;">
    <div class="row">
        <div class="col-sm-2 bg-light sidebar py-5 d-print-none">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <img src="<?php echo $stu_img ?>" alt="studentimage" class="img-thumbnail  rounded-circle">
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="StudentProfile.php">
                            <i class="fas fa-user"></i>
                            Profile <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="myCourse.php">
                            <i class="fa-duotone fa-solid fa-laptop"></i>
                            My Course
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentChangePass.php">
                            <i class="fas fa-key"></i>
                            Change Password
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentFeedback.php">
                            <i class="fas fa-comment"></i>
                            Feedback
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    


</body>
</html>
