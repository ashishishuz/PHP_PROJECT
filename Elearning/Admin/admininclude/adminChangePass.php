<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">
     
    <!-- Bootstrap Css -->
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

<?php
include_once(__DIR__ . '/../../dbConnection.php');


// if(isset($_REQUEST['adminPassUpdatebtn'])){
//     if($_REQUEST['adminPass']==""){
//         $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Feilds </div>';
//     }
//     else{
//         $adminEmail = $conn->real_escape_string($_REQUEST['admin_email']);
//         $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";

//         $res=$conn->query($sql);
//         $row = $res->fetch_assoc(); // Fetch the result as an associative array


//         if($res->num_rows==1){
//             $adminPass=$_REQUEST['adminPass'];
           

//             $sql="UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";

//             if($conn->query($sql) == TRUE){
//                 $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully </div>';
//             }
//             else{
//                $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable To Update Password</div>';
//             }
//         }
//     }
// }
if (isset($_REQUEST['admin_email'])) {
    $adminEmail = $conn->real_escape_string($_REQUEST['admin_email']);
    
    // Query to select admin details
    $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
    $res = $conn->query($sql);
    
    if ($res->num_rows == 1) {
        $row = $res->fetch_assoc(); // Fetch the result
    } else {
        echo "Admin not found.";
    }
}

if (isset($_REQUEST['adminPassUpdatebtn'])) {
    if ($_REQUEST['adminPass'] == "") {
        $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $adminPass = $conn->real_escape_string($_REQUEST['adminPass']);
        
        // Update query for password change
        $sql = "UPDATE admin SET admin_pass='$adminPass' WHERE admin_email='$adminEmail'";
        
        if ($conn->query($sql) == TRUE) {
            $msg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        } else {
            $msg = '<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Unable to Update Password</div>';
        }
    }
}

?>





<!-- yt 22:25  -->
 <!-- Form to chnage AdminPass -->
  <div class="col_sm-9 mt-5">
    <div class="row">
        <div class="col_sm-6">
            <form class="mt-5 mx-5">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo isset($adminEmail) ? $adminEmail : ''; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewPassword">New Password</label>
                    <input type="text" class="form-control" id="inputnewPassword" placeholder="New Password" name="adminPass">
                </div>
                <button type="submit" class="btn btn-danger mr-4 mt-4" name="adminPassUpdatebtn">Update</button>
                <button type="reset" class="btn btn-secondary mt-4">Reset</button>

                <?php if(isset($msg)) {echo $msg; }?>
         </form>
        </div>
    </div>
  </div>









<!-- footer -->
<script src="../js/jq.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

<script src="../js/adminajaxrequest.js"></script>

<script src="../js/custom.js"></script>


    
</body>
</html>