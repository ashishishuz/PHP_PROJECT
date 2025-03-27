<!-- Navigation Start -->
 <?php
 include('./dbConnection.php');
 include('./Main/Header.php');
 ?>

    <!-- End Navigation -->






    <!-- Start vedio bg -->
     <div class="container-fluid remove-vid-marg">

     <div class=vid-parent>
        <video playsinline autoplay muted loop>
            <source src='vedio/banner.mp4' >
        </video>
        <div class='vid-overlay'>

     </div>
      </div>
      <div class="vid-content">
        <h1 class="my-content">Welcome to MyPathshala</h1>
        <small class="my-content">Learn and Implement </small><br>
        <?php
         
         if(!isset($_SESSION['is_login'])){
          echo '<a href="#" class="btn btn-danger mt-3" data-toggle="modal" data-target="#stuRegModal">Get Started</a>';
         }
         else{
            echo '<a class="btn btn-primary mt-3" href="Student/StudentProfile.php">My Profile</a>';
         }

        ?>




        
        <!-- Button to Trigger Modal form -->
      </div>
     </div>

    <!-- End vedio bg -->








    <!-- Start Banner -->
     <div class="container-fluid bg-danger txt-banner">
        <div class="row bottom-banner">
            <div class="col-sm">
                <h5><i class="fas fa-book-open mr-3"></i>100+ Verified Online Courses</h5>
      </div>
      <div class="col-sm">
                <h5><i class="fas fa-users mr-3"></i>Skilled Instructors</h5>
      </div>
      <div class="col-sm">
                <h5><i class="fas fa-keyboard mr-3"></i>LifeTime Access</h5>
      </div>
      <div class="col-sm">
                <h5><i class="fas fa-solid fa-indian-rupee-sign"></i>  Refund Available**</h5>
      </div>

     </div>
     </div>

    <!-- End Banner -->


    <!-- Popular Courses -->
    <div class="container mt-5">
    <h1 class="text-center">Most Bought Courses</h1>

    <div class="row mt-4">
        <?php 
        $sql = "SELECT * FROM course LIMIT 3";
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '
                    <div class="col-md-4 mb-4">  <!-- Each card takes up 4 columns on medium screens -->
                        <div class="card">
                            <img src='.$row['course_image'].' class="card-img-top" alt="Course" height="200" width="200" />
                            <div class="card-body">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <p class="card-text">'. $row['course_desc'] .'</p>
                
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p class="card-text d-inline">Price: <small><del>&#8377; '.$row['course_original_price'].'</del></small>
                                    <span class="font-weight-bolder">&#8377; '.$row['course_price'].'</span><br>
                                    <small class="card-text"><b>Instructor: '.$row['course_author'].'</b></small>
                                </p>
                                <a class="btn btn-primary" href="CourseDetails.php? course_id='.$course_id.'">Enroll Now</a>
                            </div>
                        </div>
                    </div>'; // End of column div
            }
        }
        ?>
        
        <div class="row mt-4">
        <?php 
        $sql = "SELECT * FROM course LIMIT 3,3";  //3,3 to view next three courses
        $res = $conn->query($sql);
        if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $course_id = $row['course_id'];
                echo '
                    <div class="col-md-4 mb-4">  <!-- Each card takes up 4 columns on medium screens -->
                        <div class="card">
                            <img src='.$row['course_image'].' class="card-img-top" alt="Course" height="200" width="200" />
                            <div class="card-body">
                                <h5 class="card-title">' . $row['course_name'] . '</h5>
                                <p class="card-text">'. $row['course_desc'] .'</p>
                
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <p class="card-text d-inline">Price: <small><del>&#8377; '.$row['course_original_price'].'</del></small>
                                    <span class="font-weight-bolder">&#8377; '.$row['course_price'].'</span><br>
                                    <small class="card-text"><b>Instructor: '.$row['course_author'].'</b></small>
                                </p>
                                <a class="btn btn-primary" href="CourseDetails.php? course_id='.$course_id.'">Enroll Now</a>
                            </div>
                        </div>
                    </div>'; // End of column div
            }
        }
        ?>
        </div>
    </div> <!-- End of row -->
    
    <div class="text-center m-2">
        <a class="btn btn-danger btn-sm" href="Courses.php">View All Courses</a>
    </div>
</div>

<!-- Popular Course Ends -->


<!-- End Contact Us -->
 <?php
 include('./Contact.php')

 ?>

<!-- End Contact Us -->
  

<!-- Testimonials -->
 <!-- Carousel wrapper -->
 <div class="testimonial-section">
    <h2>Student's Feedback</h2>
    <div id="testimonialCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php 
            // Using JOIN to fetch stu_image, name, and occ from the student table
            $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content 
                    FROM student AS s 
                    JOIN feedback AS f ON s.stu_id = f.stu_id";
            
            $res = $conn->query($sql);
            if ($res->num_rows > 0) {
                $first = true;
                $count = 0;
                
                while ($row = $res->fetch_assoc()) {
                    $s_img = $row['stu_img'];
                    $n_img = str_replace('..', '.', $s_img);
                    
                    // Open a new carousel item for every 3 reviews
                    if ($count % 3 === 0) {
                        if ($count > 0) {
                            echo '</div></div>'; // Close previous carousel item and row divs
                        }
                        echo '<div class="carousel-item ' . ($first ? 'active' : '') . '">';
                        echo '<div class="row">';
                        $first = false;
                    }
            ?>
                    <div class="col-md-4">
                        <div class="testimonial">
                            <img src="<?php echo $n_img; ?>" alt="Reviewer" class="reviewer-photo">
                            <p><?php echo $row['f_content']; ?></p>
                            <p>- <?php echo $row['stu_name']; ?></p>
                            <small><?php echo $row['stu_occ']; ?></small>
                        </div>
                    </div>
            <?php 
                    $count++;
                }
                echo '</div></div>'; 
            }
            ?>
        </div>
        <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>





<!-- Footer Section -->
 <div class="container-fluid bg-danger">
    <div class="row text-white text-center p1">
        <div class="col-sm ">
            <a class="text-white social-hover" href="#"><i class="fa-brands fa-facebook"></i>  Facebook</a>
         </div>
     <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fa-brands fa-square-x-twitter"></i>  Twitter</a>
            </div>
            <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fa-brands fa-whatsapp"></i>  Whatsapp</a>
               </div>
               <div class="col-sm">
            <a class="text-white social-hover" href="#"><i class="fa-brands fa-instagram"></i>  Instagram</a>
            </div>
    </div>
 </div>



<div class="container-fluid p-4" style="background-color:#fff">
    <div class="container" style="background-color:#fff">
        <div class="row text-center">
            <div class="col-sm">
                <h5>About Us</h5>
                <p>MyPathshala is an organization that aims to provide quality courses developed by skilled instructors in such a way 
                    which is easy to grasp and can help students to excel in their Acacdemics. With Collaboration with Top universities
                     and organizations.
                </p>
            </div>
            <div class="col-sm">
                <h5>Category</h5>
                <a class="text-dark" href="#">Web Development</a><br>
                <a class="text-dark" href="#">Andriod App Development</a><br>
                <a class="text-dark" href="#">Operating Systems</a><br>
                <a class="text-dark" href="#">Machine Learning</a><br>
                <a class="text-dark" href="#">Data Structures</a><br>
            </div>
            <div class="col-sm">
                <h5>Contact Us</h5>
                <p>MyPathshala Pvt Ltd <br> Near Navy Base <br> Navi Mumbai, Maharashtra
                <br /><i class="fa-solid fa-phone"></i> +91-6789311122</p>
            </div>
        </div>

    </div>


<!-- Footer Setion -->

<?php
include('./Main/Footer.php');
?>

<!-- End Footer -->

