<?php
if(!isset($_SESSION)){
    session_start();
}

include_once(__DIR__ . '/../dbConnection.php');
include('./stuInclude/Header.php');

if(isset($_SESSION['is_login'])){
    $stuEmail=$_SESSION['stuLogMail'];
}
else{
    echo "<script> location.href='../index.php';</script>";
}

$sql="SELECT * FROM student WHERE stu_email='$stuEmail'";
$res=$conn->query($sql);
if($res->num_rows==1){
    $row=$res->fetch_assoc();
    $stuId=$row["stu_id"];
}

if(isset($_REQUEST['submitFeedbackBtn'])){
    if(($_REQUEST['f_content']=="")){
        $passmsg='<div class="alert alert-danger col-sm-6 ml-5 mt-2" role="alert">Fill All Feilds</div>';
    }
    else{
        $fcontent=$_REQUEST["f_content"];
        $sql="INSERT INTO feedback (f_content,stu_id) VALUES ('$fcontent','$stuId')";

        if($conn->query($sql)==TRUE){
            $passmsg='<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Feedback Submitted </div>';
        }
        else {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Submit</div>';
        }
    }
}

?>

<!-- form to submit feedback -->
 <div class="col-sm-6 mt-5">
    <form class="mx-5" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="stuId">Student ID</label>
            <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if(isset($stuId)) {echo $stuId;} ?>" readonly> 
        </div>
        <div class="form-group">
            <label for="f_content">Give Feedback: </label>
            <textarea class="form-control" id="f_content" name="f_content" row=4></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="submitFeedbackBtn">Submit</button>

        <?php if(isset($passmsg)) {echo $passmsg; } ?>
</form>

 </div>
</div>

<!-- footer -->
<?php
include('./stuInclude/footer.php');
?>