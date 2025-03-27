<!-- Header Start -->
 <?php
 include('./Main/Header.php');
 ?>
 <!-- Header End -->


<div class="container-fluid bg-dark">
<div class="row">
<img src="./images/courses.jpeg" alt="courses" style="height:500px; width:100%; object-fit:cover; box-shadow:10px;" />
</div>
</div>


<!-- Payments Form -->
 <div class="container">
    <h2 class="text-center my-4">Payment Status</h2>
    <form method="post" action="">
        <div class="form-group row">
            <label class="offset-sm-3 col-form-label">Order ID: </label>
            <div>
                <input type="text" class="form-control mx-3">
            </div>
            <div>
                <input type="submit" class="btn btn-primary mx-4" value="View">
            </div>


        </div>
</form>
 </div>
 <!-- Payments End -->


 <!-- Contact Us -->
  <?php
  include('./Contact.php');
  ?>

 <!-- End Contact -->

<!-- Footer Start -->

<?php
include('./Main/Footer.php');
?>

<!-- Footer End -->
