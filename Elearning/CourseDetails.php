<!-- Header Start -->
<?php
 include('./dbConnection.php');
 include('./Main/Header.php');
 ?>
 <!-- Header End -->


<div class="container-fluid bg-dark">
<div class="row">
<img src="./images/courses.jpeg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
</div>
</div>

<!-- Main Content Course -->
<div class="container mt-5">
    <?php 
    if(isset($_GET['course_id'])){
        $course_id=$_GET['course_id'];
        $sql="SELECT * FROM course WHERE course_id='$course_id'";
        $res=$conn->query($sql);
        $row=$res->fetch_assoc();

    }
    ?>
    <div class="row">
        <div class="col-md-4">
            <img src=<?php echo $row['course_image'] ?> class="card-img-top" alter="Course" />
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">
                    Course Name: <?php echo $row['course_name']; ?>
                </h5>
                <p class="card-text"><?php echo $row['course_desc'] ?></p>
                <p class="card-text">Course Duration: <b><?php echo $row['course_duration'] ?></b> Days</p>
                <form action="Checkout.php" method="post">
                <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?></del></small><span class="font-weight-bolder"> &#8377 <?php echo $row['course_price'] ?><span></p>
                <input type="hidden" name="id" value="<?php echo $row['course_price'] ?>">
                <button class="btn btn-primary text-white font-weight-bolder float-right" name="buy">Buy Now</button>


               </form>
            </div>
        </div>
    </div>
    

    <div class="container">
        <div class="row">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th scope="col">Total Modules</th>
                        <th scope="col">Syllabus Covered</th>
                    </tr>
                </thead>
              </tbody>

              <tr>
                <th scope="row">7</th>
                <td>Includes All Fundamentals,Basics and Complete Syntax with a detailed project at last</td>
            </tr>
            
            
</tbody>
</table>


        </div>
    </div>

</div>


<!-- Footer Start -->

<?php
include('./Main/Footer.php');
?>

<!-- Footer End -->
