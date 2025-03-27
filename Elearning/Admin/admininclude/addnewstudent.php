
<!-- adminheader starts -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
     
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../Css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


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
<?php


// Creating connection to add form data to db
include_once(__DIR__ . '/../../dbConnection.php');



if(isset($_REQUEST['newStuSubmitBtn'])){
    // checking for empty fields
    // $ helps to fetch the data written inside the fields
    if(($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "")
    || ($_REQUEST['stu_occ'] == "")){
     $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">All FIELDS ARE MANDATORY</div>';
    }

    // if fields are not empty insert data
    else{
         $stu_name = $_REQUEST['stu_name'];
         $stu_email = $_REQUEST['stu_email'];
         $stu_pass = $_REQUEST['stu_pass'];
         $stu_occ = $_REQUEST['stu_occ'];

         //sql query
         $sql= "INSERT INTO student (stu_name,stu_email,stu_pass,stu_occ) VALUES ('$stu_name','$stu_email','$stu_pass','$stu_occ')";

         if($conn->query($sql) == TRUE){
            $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">STUDENT ADDED SUCCESSFULLY</div>';

         } 
         else{
            $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">UNABLE TO ADD STUDENT</div>';
 
         }




    }
}
?>
<!-- adminheader ends -->
     



<!-- Form to add new  Students -->
<div class="col-sm-6 ml-2 mt-5 mb-4" style="background-color: #f3f3f3;">
    <h3 class="text-center mt-4"><i class="fas fa-user-graduate"></i> Add New Student</h3>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stu_name">Name</label>
            <input type="text" class="form-control" id="stu_name" name="stu_name" style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="stu_email">Email</label>
            <input type="text" class="form-control" id="stu_email" name="stu_email">
        </div>
        <div class="form-group">
            <label for="stu_pass">Password</label>
            <input type="text" class="form-control" id="stu_pass" name="stu_pass">
        </div>
        <div class="form-group">
            <label for="stu_occ">Occupation</label>
            <input type="text" class="form-control" id="stu_occ" name="stu_occ">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger mb-4" id="newStuSubmitBtn" name="newStuSubmitBtn">Submit</button>
            <a href="../students.php" class="btn btn-secondary mb-4">Close</a>
        </div>

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
 