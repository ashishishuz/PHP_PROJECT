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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">


     
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
                                <a class="nav-link" href="adminDashboard.php">
                                    <i class="fas fa-tachometer-alt"></i>
                                    DASHBOARD
                                </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="courses.php">
                            <i class="fas fa-book"></i>
                                Courses
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="#">
                            <i class="fas fa-chalkboard-teacher"></i>
                                Lessons
                            </a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="students.php">
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
                            <a class="nav-link" href="#">
                            <i class="fas fa-comments"></i>   
                                Feedback
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./admininclude/adminChangePass.php">
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

<!-- header sectionclosed -->


<?php
include_once(__DIR__ . '/../dbConnection.php');

?>

<!-- lessons part not working vid 13 -->


<!-- Editing lessons of course -->
 <div class="col-sm-9 mt-5 mx-3">
    <form action=""  class="mt-3 form-inline d-print-none">
        <div class="form-group mr-3">
            <label for="checkid">Enter Course Id: </label>
            <input for="text" class="form-control ml-3" id="checkid" name="checkid">
           </div>
           <button type="submit" class="btn btn-secondary">Search</button>
    </form>

    <?php
    $sql="SELECT course_id FROM course";
    $res=$conn->query($sql);
    while($row = $res->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){  //checking if input field couse_id matches with id from the db of course table
       $sql="SELECT * FROM course WHERE course_id={$_REQUEST['checkid']}";
       $res=$conn->query($sql);
       $row = $res->fetch_assoc();

       if(($row['course_id']) == $_REQUEST['checkid']){  
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
        ?>
        
         <h3 class="mt-5 bg-dark text-white p-2">Course ID: <?php if(isset($row['course_id'])) {echo $row['course_id']; }?>
        Course Name: <?php if(isset($row['course_name'])) {echo $row['course_name']; }?> </h3>


     <?php  
      $sql="SELECT * FROM lesson WHERE course_id = 0";
      $res=$conn->query($sql);
      
      echo '<table class="table">
      <thead>
      <tr>
      <th scope="col">lesson Id</th>
       <th scope="col">lesson Name</th>
       <th scope="col">lesson Link</th>
       <th scope="col">Action</th>
       <tr>
       </thead>
       <tbody>';

       while($row=$res->fetch_assoc()){
        echo '<tr>';
        echo '<th scope="row">'.$row["lesson_id"].'</th>';
        echo '<td>'.$row["lesson_name"].'</td>';
        echo '<td>'.$row["lesson_link"].'</td>';
        echo '<td>
        <form action="./admininclude/editlesson.php" method="POST" class="d-inline">
            <input type="hidden" name="id" value="' . $row["lesson_id"] . '">
            <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                <i class="fas fa-pen"></i>
            </button>
        </form>
        <form action="" method="POST" class="d-inline">
            <input type="hidden" name="id" value="' . $row["lesson_id"] . '">
            <button type="submit" class="btn btn-danger mr-3" name="delete" value="Delete">
                <i class="fas fa-trash-alt"></i>
            </button>
        </form>
    </td>';

       }

    }
    }
    }
    ?>

        </div>


<!-- showing Add button only when cousrse id exists  -->
 <?php if(isset($_SESSION['course_id'] )){
  echo '<div>
 <a class="btn btn-danger box" href="./admininclude/addLesson.php"><i class="fas fa-plus fa-2x"></i></a>   
 </div>';
 }
 ?>
 




 </div>













































































<!-- footer section -->

<!-- Jquery and Boostartp Javascript -->
<script src="../js/jq.min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

<script src="../js/adminajaxrequest.js"></script>

<script src="../js/custom.js"></script>


    
</body>
</html>