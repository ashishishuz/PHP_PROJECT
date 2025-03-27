<?php
//session start
if(!isset($_SESSION)){
    session_start();
}




include_once(__DIR__ . '/../dbConnection.php');



//checking mail already registered 
if (isset($_POST['checkmail']) && isset($_POST['stumail'])) {
    $stumail = $_POST['stumail'];

    $sql = "SELECT stu_email FROM student WHERE stu_email='".$stumail."'";
    $res = $conn->query($sql);

    // Get the number of rows returned by the query
    $row = $res->num_rows;

    // Return a JSON response
    echo json_encode($row);
    
}






//insert student

if(isset($_POST['stusignup']) && isset($_POST['stuname']) && isset($_POST['stumail']) && isset($_POST['stupass'])) {

    $stuname = $_POST['stuname'];
    $stumail = $_POST['stumail'];
    $stupass = $_POST['stupass'];

    // Insert query
    $sql = "INSERT INTO student(stu_name, stu_email, stu_pass) VALUES ('$stuname', '$stumail', '$stupass')";

    // Execute the query and check for success
    if($conn->query($sql)) {
        echo json_encode("OK");
    } else {
        echo json_encode("FAILED: " . $conn->error); 
    }
}




// student login verification
if(!isset($_SESSION['is_login'])){
if(isset($_POST['check']) && isset($_POST['stuLogMail']) && isset($_POST['stuLogPass'])){
    $stuLogMail= $_POST['stuLogMail'];
    $stuLogPass= $_POST['stuLogPass'];


    $sql="SELECT stu_email,stu_pass FROM student WHERE stu_email='".$stuLogMail."' AND stu_pass='".$stuLogPass."'";

    $res=$conn->query($sql);
     
    $row=$res->num_rows;

    if($row === 1){

        //creating session once user is loggedin
        $_SESSION['is_login']=true;
        $_SESSION['stuLogMail']=$stuLogMail;

        echo json_encode($row);



    }
    else if($row===0){
        echo json_encode($row);
    }
    
}
}
?>
