<?php
if(!isset($_SESSION)){
    session_start();
}


include_once(__DIR__ . '/../dbConnection.php');
include('./stuInclude/Header.php');

if (isset($_SESSION['is_login'])) {
    $stuEmail = $_SESSION['stuLogMail'];
} else {
    echo "<script> location.href='../index.php'; </script>";
    exit;
}


if(isset($_REQUEST['stuPassUpdateBtn'])){
    if(($_REQUEST['stuNewPass'] == "")){
        $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Enter New Password!</div>';
    }
    else{
        $sql="SELECT * FROM student WHERE stu_email='$stuEmail'";
        $res=$conn->query($sql);
        if($res->num_rows==1){
            $stuPass=$_REQUEST['stuNewPass'];
            $sql="UPDATE student SET stu_pass='$stuPass' WHERE stu_email='$stuEmail'";

            if($conn->query($sql)==TRUE){
                $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Password Updated</div>';
            }
            else{
                $passmsg='<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Update!</div>';
               }
        }
    }
}

?>


<div class="col-sm-9 col-md-10">
    <div class="row">
        <div class="col-sm-6">
            <form class="mt-5 mx-5" method="POST">
                <div class="form-group">
                    <label for="inputEmail">Email</label>
                    <input type="email" class="form-control" id="inputEmail" value="<?php echo $stuEmail ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="inputnewpassword">New Password</label>
                    <input type="passowrd" class="form-control" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
                </div>
                <button type="submit" class="btn btn-warning mr-4 mt-4" name="stuPassUpdateBtn">Submit</button>
                <?php if(isset($passmsg)) {echo $passmsg; } ?>
        </form>
        </div>
    </div>
</div>

<!-- footer -->
<?php
include('./stuInclude/footer.php');
?>