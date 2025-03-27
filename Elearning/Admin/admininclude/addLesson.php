<?php
session_start(); // Add this at the top of your PHP files if not already included

?>
<!-- adminheader starts -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
     
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../Css/bootstrap.min.css">

    <!-- Font Awesome -->
    <!-- <link rel='stylesheet' href='../Css/all.min.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     
     <!-- Google Font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link rel='stylesheet' href='../Css/adminstyle.css'>
    <title>Courses</title>
</head>
<body>
      <!-- Top Navbar -->

      <nav class="navbar navbar-dark fixed-top p-0 shadow" style="background-color: #225470;">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="adminDasboard.php">My-Pathshala<small class="text-white"> Admin Area</small></a>
        </nav>


     <!-- Side Bar -->
         <div class="container-fluid mb-5" style="margin-top:40px;">
            <div class="row">
                <nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
                    <div class="sidebar-sticky">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="../adminDashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    DASHBOARD
                                </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../courses.php">
                            <i class="fas fa-book"></i>
                                Courses
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../lessons.php">
                            <i class="fas fa-chalkboard-teacher"></i>
                                Lessons
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="../students.php">
                                <i class="fas fa-users"></i>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-table"></i>
                                sell report
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-table"></i>
                                Payment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../Feedback.php">
                            <i class="fas fa-comments"></i>   
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="adminChangePass.php">
                                <i class="fas fa-key"></i>
                                Change Password
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
                </nav>
    
</body>
</html>
<head>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>




<!-- php code starts here -->
<?php

// Creating connection to add form data to db
include_once(__DIR__ . '/../../dbConnection.php');



if(isset($_REQUEST['lessonSubmitBtn'])){
    // checking for empty fields
    // $ helps to fetch the data written inside the fields
    if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "")){
     $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">All FIELDS ARE MANDATORY</div>';
    }

    // if fields are not empty insert data
    else{
         $lesson_name = $_REQUEST['lesson_name'];
         $lesson_desc = $_REQUEST['lesson_desc'];
         $course_id = $_REQUEST['course_author'];
         $course_name = $_REQUEST['course_name'];
         $lesson_link = $_FILES['lesson_link']['name'];
         $lesson_link_temp=$_FILES['lesson_link']['tmp_name'];
        

          //uploading vedios in vedios folder
         $link_folder = '../../lessonsvid/'.$lesson_link;
         move_uploaded_file($lesson_link_temp,$link_folder);

         $sql= "INSERT INTO lesson (lesson_name,lesson_desc,lesson_link,course_id,course_name)
          VALUES ('$lesson_name','$lesson_desc','$link_folder','$course_id',' $course_name')";

         if($conn->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">LESSON ADDED SUCCESSFULLY</div>';

         } 
         else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">UNABLE TO ADD NEW LESSON</div>';
 
         }




    }
}
?>
<!-- adminheader ends -->
     


<!-- Form to add new Course -->
<div class="col-sm-7 ml-2 mt-5 mx-9 jumbotron"> 
    <h3 class="text-center"><i class="fas fa-laptop-code"></i> Add New Lesson</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="lesson_name">Lesson Name</label> 
            <input type="text" class="form-control" id="lesson_name" name="lesson_name" style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="lesson_desc">Lesson Description</label> 
            <textarea class="form-control" id="lesson_desc" name="lesson_desc" rows="2" style="width: 100%;"></textarea> 
        </div>
        <div class="form-group">
            <label for="lesson_link">Lesson Link</label> 
            <input type="file" class="form-control-file" id="lesson_link" name="lesson_link" rows="2" style="width: 100%;">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
            <a href="../lessons.php" class="btn btn-secondary">Close</a>
            <?php if(isset($msg)) {echo $msg; } ?>
        </form>
        </div>
        
</div>


<!-- Form closed  -->



<!-- adminfooter starts -->

<?php
include('./adminfooter.php');
?>

<!-- adminfooter ends -->
 