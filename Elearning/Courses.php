
<!-- Header Section Start & including db file -->
<?php
 include('./dbConnection.php');
include('./Main/Header.php');
?>
<!-- Header Section End -->

<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/courses.jpeg" alt="Courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;"/>
    </div>
</div>


<!-- All Courses -->
 
    <!-- All Courses -->
    <div class="container mt-5">
    <h1 class="text-center">All Courses</h1>
    <div class="row mt-4">
        <?php 
        $sql = "SELECT * FROM course";
        $res = $conn->query($sql);
        if($res->num_rows > 0){
            while($row = $res->fetch_assoc()){
                $course_id = $row['course_id'];
                echo '
                <div class="col-md-4 mb-4 d-flex">
                    <div class="card w-100">
                        <img src="'.str_replace('..','.',$row['course_image']).'" class="card-img-top" alt="Course Image">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['course_name'].'</h5>
                            <p class="card-text">'.$row['course_desc'].'</p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].' </del></small>
                            <span class="font-weight-bold">&#8377 '.$row['course_price'].'</span></p>
                            <a class="btn btn-primary text-white font-weight-bold float-right" href="CourseDetails.php?course_id='.$course_id.'">Enroll</a>
                        </div>
                    </div>
                </div>';
            }
        }
        ?>
    </div>
</div>

<!-- All Course Ends -->


<!-- End Courses -->

<!-- Footer Start -->
<?php
include('./Main/Footer.php');
?>
<!-- Footer End -->
