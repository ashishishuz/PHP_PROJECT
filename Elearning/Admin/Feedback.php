<?php
                    if (!isset($_SESSION)) {
                        session_start();
                    }
                 
                include('./admininclude/adminheader.php');
// <!-- header ends -->


// <!-- db connection -->
 
include_once(__DIR__ . '/../dbConnection.php');


if(isset($_SESSION['is_admin_login'])){
    $adminEmail=$_SESSION['adminLogMail'];
}
else{
    echo "<script> location.href='../index.php'; </script>";
}
?>


<div class="col-sm-9 mt-5">
    <!-- table -->
     <p class="bg-dark text-white p-2">Feedback From Students</p>
     <?php
     $sql="SELECT * FROM feedback";
     $res=$conn->query($sql);
     if($res->num_rows>0){
        echo '<table class="table">
        <thead>
        <tr>
        <th scope="col">Feedback ID</th>
        <th scope="col">Content</th>
        <th scope="col">Student Id</th>
        <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>';

        while($row=$res->fetch_assoc()){
            echo '<tr>';
            echo '<th scope="row">'.$row["f_id"].'</th>';
            echo '<td>'.$row["f_content"].'</td>';
            echo '<td>'.$row["stu_id"].'</td>';
            echo '<td><form action="" method="POST"
            class="d-inline"><input type="hidden" name="id" value='.$row["f_id"].'><button type="submit" class="btn btn-secondary" name="delete"
            value="Delete"><i class="far fa-trash-alt"></i></button></form></td></tr>';
        }
        echo '</tbody>
        </table>';
     }
     else{
        echo '<div class="container mt-5">
        <div class="alert alert-danger text-center" style="background-color: #f8d7da; color: #721c24; border-color: #f5c6cb;">
        <i class="fas fa-ghost"></i> NO RECORDS TO DISPLAY</div>
        </div>';
     }

     if(isset($_REQUEST['delete'])){
        $sql="DELETE FROM feedback WHERE f_id={$_REQUEST['id']}";

        if($conn->query($sql)==TRUE){

            echo '<meta http-equip="refresh" content="0;URL=? deleted" />'; 
        }
        else{
            echo "Unable to Delete Data";
        }
     }

     ?>
     </div>
    </div>
    </div>


    <!-- footer -->
    <?php
include('./admininclude/adminfooter.php');
?>