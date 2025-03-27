 <!-- adminheader starts -->
                <?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                 
                include('./admininclude/adminheader.php');
// <!-- header ends -->


// <!-- db connection -->
 
include_once(__DIR__ . '/../dbConnection.php');


// checking whether admin is loggedin
// Check later
// if (isset($_SESSION['is_admin_login'])) {
//     $adminEmail = $_SESSION['adminLogMail'];
//     // Show admin dashboard content here
// } else {
//     // If not logged in, redirect to index page
//     echo "<script> location.href='../../index.php'; </script>";
    
// }


?>


<!-- courses -->
 <div class="col-sm-9 mt-5">
    <!-- table -->
     <p class="bg-dark text-white p-2">List of Courses</p>
     <?php 
     $sql="SELECT * FROM course";
     $res = $conn->query($sql);
    //  checking if courses exists in db i.e in course table if no. of rows > 0 means course data exists then only will show table
     if($res->num_rows>0){
     ?>
     <table class="table">
        <thead>
            <tr>
                <th scope="col">Course ID</th>
                <th scope="col">Name</th>
                <th scope="col">Author</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- loop to display course contents -->
             <?php
             while($row = $res->fetch_assoc()){ 
            echo '<tr>';
                
                echo '<th scope="row">'.$row['course_id'].'</th>';
                echo '<td>'.$row['course_name'].'</td>';
                echo '<td>'.$row['course_author'].'</td>';
                echo '<td>';
                echo '
                
                <form action="./admininclude/editcourse.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["course_id"].'>
                <button type="submit" class="btn btn-info mr-3" name="view" value="View">
                <i class="fas fa-pen"></i>
                </button>
                </form>



                <form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["course_id"].'>
                <button type="submit" class="btn btn-secondary" name="delete" value="Delete">
                <i class="fas fa-trash-alt"></i>
                </button>
                </form>';
               echo '</td>';
               echo '</tr>';
                } ?>
                </tbody>
                </table>
                <?php } 
                else{
                    echo '<div class="container mt-5">
                   <div class="alert alert-danger text-center" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
                   <i class="fas fa-ghost"></i> NO RECORDS TO DISPLAY</div>
                   </div>';
                }?>
 </div>
</div>

<div>
    <a class="btn btn-danger box" href="./admininclude/addCourse.php"><i class="fas fa-plus fa-2x"></i></a>
</div>
</div>


<!-- Deleting course from course_id -->
 <?php
if(isset($_REQUEST['delete'])){
    $sql="DELETE FROM course WHERE course_id={$_REQUEST['id']}";
    //refreshing page is course is deleted
    if($conn->query($sql) == TRUE){
        echo '<meta http-equip="refresh" content="0;URL=?deleted" />';
    }
    else{
        echo "Unabale to delete Course";
    }
}
 ?>



<!-- adminfooter starts -->

<?php
include('./admininclude/adminfooter.php');
?>

<!-- adminfooter ends -->