<?php

if(!isset($_SESSION)){
    session_start();
}




include_once(__DIR__ . '/../dbConnection.php');





//admin verification


if(!isset($_SESSION['is_admin_login'])){
    if(isset($_POST['check']) && isset($_POST['adminLogMail']) && isset($_POST['adminLogPass'])){
        $adminLogMail= $_POST['adminLogMail'];
        $adminLogPass= $_POST['adminLogPass'];
    
    
        $sql="SELECT admin_email,admin_pass FROM admin WHERE admin_email='".$adminLogMail."' AND admin_pass='".$adminLogPass."'";
    
        $res=$conn->query($sql);
         
        $row=$res->num_rows;
    
        if($row === 1){
    
            //creating session admin is loggedin
            $_SESSION['is_admin_login']=true;
            $_SESSION['adminLogMail']=$adminLogMail;
    
            echo json_encode($row);
    
    
    
        }
        else if($row===0){
            echo json_encode($row);
        }
        
    }
    }
    
    
?>