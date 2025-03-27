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
                            <a class="nav-link" href="../../logout.php">
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

<!-- admin header closes -->



</head>
<?php
//copy/paste it in every adminarea like addCourse/dashboard to protect if needed for sample applied on courses page
// if(!isset($_SESSION)){
//     session_start();

//     if (isset($_SESSION['is_admin_login'])) {
//         $adminEmail = $_SESSION['adminLogMail'];
//         // Show admin dashboard content here
//     } else {
//         // If not logged in, redirect to index page
//         echo "<script> location.href='../../index.php'; </script>";
        
//     }
    
// }
// Creating connection to add form data to db
include_once(__DIR__ . '/../../dbConnection.php');



//Update code
if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['course_name'] == "") || ($_REQUEST['course_desc'] == "") || ($_REQUEST['course_author'] == "")
    || ($_REQUEST['course_duration'] == "") || ($_REQUEST['course_price'] == "") || ($_REQUEST['course_original_price'] == "")){
     $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">All FIELDS ARE MANDATORY</div>';
    }

    else{
        // 
        $cid = $_REQUEST['course_id'];
        $cname=$_REQUEST['course_name'];
        $cdesc = $_REQUEST['course_desc'];
        $cauthor = $_REQUEST['course_author'];
        $cduration = $_REQUEST['course_duration'];
        $cprice = $_REQUEST['course_price'];
        $coriginalprice = $_REQUEST['course_original_price'];
       

        $cimage = $_FILES['course_img']['name'];  //fetching name of the image        
        $img_folder = '../../images/uploaded/'.$cimage;
         

        //Sql to update fields
        $sql= "UPDATE course SET course_id='$cid', course_name='$cname',course_desc='$cdesc',course_author='$cauthor'
        ,course_image='$cimage',course_duration='$cduration',course_price='$cprice',course_original_price='$coriginalprice'
        WHERE course_id='$cid' ";

      if($conn->query($sql) == TRUE){
    $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">UPDATED SUCCESSFULLY</div>';

      } 
     else{
    $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">UNABLE TO UPDATE COURSE DETAILS</div>';

     }

 
     

    }

}




















?>

<!-- edit courseForm -->
<div class="col-sm-7 ml-2 mt-5 mx-9 jumbotron"> 
    <h3 class="text-center">Edit Course</h3>
    
    <?php
     if(isset($_REQUEST['view'])){
        $sql="SELECT * FROM course WHERE course_id={$_REQUEST['id']}";

        $res=$conn->query($sql);
        $row=$res->fetch_assoc();

     }
    ?>




    <form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
            <label for="course_name">Course Id</label> 
            <input type="text" class="form-control" id="course_id" name="course_id" value="<?php if(isset($row['course_id'])) 
             {echo $row['course_id']; } ?>" style="width: 100%;" readonly>
             <!-- readonly means id can't be changed/updated -->
        </div>
        <div class="form-group">
            <label for="course_name">Course Name</label> 
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php if(isset($row['course_name'])) 
             {echo $row['course_name']; } ?>" style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="course_desc">Course Description</label> 
            <textarea class="form-control" id="course_desc" name="course_desc" rows="4" 
             style="width: 100%;">"<?php if(isset($row['course_desc'])) 
             {echo $row['course_desc']; } ?>"</textarea> 
        </div>
        <div class="form-group">
            <label for="course_author">Course Author</label> 
            <input type="text" class="form-control" id="course_author" name="course_author" value="<?php if(isset($row['course_author'])) 
             {echo $row['course_author']; } ?>"
             style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="course_duration">Course Duration</label> 
            <input type="text" class="form-control" id="course_duration" name="course_duration" value="<?php if(isset($row['course_duration'])) 
             {echo $row['course_duration']; } ?>"
            style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="course_original_price">Course Original Price</label> 
            <input type="text" class="form-control" id="course_original_price" name="course_original_price" value="<?php if(isset($row['course_original_price'])) 
             {echo $row['course_original_price']; } ?>"
            style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="course_price">Discount Price</label> 
            <input type="text" class="form-control" id="course_price" name="course_price" value="<?php if(isset($row['course_price'])) 
             {echo $row['course_price']; } ?>"
            style="width: 100%;">
        </div>
        <div class="form-group">
            <label for="course_img">Course Image</label> 
            <img src="<?php if(isset($row['course_image'])) 
             {echo $row['course_image']; } ?>" alt="" class="img-thumbnail"/>
            <input type="file" class="form-control-file" id="course_img" name="course_img" style="color: red;">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-warning" id="requpdate" name="requpdate" >Update</button>
            <a href="../courses.php" class="btn btn-secondary">Close</a>
        </div>
        <?php if(isset($msg)) {echo $msg; } ?>



    </form>
</div>
<!-- close editform -->














<!-- adminfooter starts -->

<?php
include('./adminfooter.php');
?>

<!-- adminfooter ends -->
 