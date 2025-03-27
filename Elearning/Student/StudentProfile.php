<?php
if (!isset($_SESSION)) {
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

$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
$res = $conn->query($sql);
if ($res->num_rows == 1) {
    $row = $res->fetch_assoc();
    $stuId = $row["stu_id"];
    $stuName = $row['stu_name'];
    $stuOcc = $row["stu_occ"];
    $stuImg = $row['stu_img'];
}

if (isset($_REQUEST['updateStuNameBtn'])) {
    if (empty($_REQUEST['stuName']) || empty($_REQUEST['stuOcc'])) {
        $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Fill All Fields</div>';
    } else {
        $stuName = $_REQUEST["stuName"];
        $stuOcc = $_REQUEST["stuOcc"];
        
        // Check if a new image was uploaded
        if (isset($_FILES['stuImg']) && $_FILES['stuImg']['name'] != "") {
            $stu_image = $_FILES['stuImg']['name'];
            $stu_image_temp = $_FILES['stuImg']['tmp_name'];
            $img_folder = '../images/stu/' . $stu_image;
            move_uploaded_file($stu_image_temp, $img_folder);
        } else {
            // If no new image uploaded, keep the current image
            $img_folder = $stuImg;
        }

        $sql = "UPDATE student SET stu_name='$stuName', stu_occ='$stuOcc', stu_img='$img_folder' WHERE stu_email='$stuEmail'";

        if ($conn->query($sql) === TRUE) {
            $passmsg = '<div class="alert alert-success col-sm-6 ml-5 mt-2" role="alert">Updated Successfully</div>';
        } else {
            $passmsg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert">Unable to Update! Try Again Later</div>';
        }
    }
}
?>

<div class="container mt-5 d-flex">
    <!-- Profile Update Form -->
    <div class="col-md-6">
        <form class="mx-5" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="stuId">Student ID</label>
                <input type="text" class="form-control" id="stuId" name="stuId" value="<?php if (isset($stuId)) { echo $stuId; } ?>" readonly>
            </div>
            <div class="form-group">
                <label for="stuEmail">Student Email</label>
                <input type="email" class="form-control" id="stuEmail" name="stuEmail" value="<?php echo $stuEmail; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="stuName">Student Name</label>
                <input type="text" class="form-control" id="stuName" name="stuName" value="<?php if (isset($stuName)) { echo $stuName; } ?>">
            </div>
            <div class="form-group">
                <label for="stuOcc">Student Qualification</label>
                <input type="text" class="form-control" id="stuOcc" name="stuOcc" value="<?php if (isset($stuOcc)) { echo $stuOcc; } ?>">
            </div>
            <div class="form-group">
                <label for="stuImg">Upload Image</label>
                <input type="file" class="form-control-file" id="stuImg" name="stuImg">
            </div>
            <button type="submit" class="btn btn-primary" name="updateStuNameBtn">Update</button>
            <?php if (isset($passmsg)) { echo $passmsg; } ?>
        </form>
    </div>
</div>

<!-- footer -->
<?php
include('./stuInclude/footer.php');
?>
