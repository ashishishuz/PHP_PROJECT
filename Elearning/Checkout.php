<?php 
include('./dbConnection.php');
session_start();
// if not logged in, redirect to login page
if(!isset($_SESSION['stuLogMail'])){
    echo "<script>location.href='LoginSignup.php'</script>";
}
else{
    // Paytm Kit
    header("Pragma: no-cache");
    header("Cache-Control: no-cache");
    header("Expires: 0");
    $stuEmail = $_SESSION['stuLogMail'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="GENERATOR" content="Evrsoft First Page">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHECKOUT PAGE</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="Css/all.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Css/style.css">

    <style>
        body {
            background-color:#f1f3f5;
            font-family: 'Ubuntu', sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .jumbotron {
            background-color: light grey;
            padding: 2rem 2.5rem;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .jumbotron h3 {
            color: #343a40;
        }
        .form-control, .btn {
            border-radius: 5px;
        }
        .btn-warning {
            background-color: #ff8800;
            border: none;
        }
        .btn-warning:hover {
            background-color: #ff7700;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .form-text {
            color: #6c757d;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="col-sm-6">
        <div class="jumbotron text-center">
            <h3 class="mb-5">Welcome to MyPathshala Payment Gateway</h3>
            <form method="post" action="displayQRCode.php">
                <div class="form-group row">
                    <label for="ORDER_ID" class="col-sm-4 col-form-label text-left">Order ID</label>
                    <div class="col-sm-8">
                        <input id="ORDER_ID" name="ORDER_ID" class="form-control" maxlength="20" size="20" value="<?php echo "ORDS" . rand(10000,99999999); ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="CUST_ID" class="col-sm-4 col-form-label text-left">Student Email</label>
                    <div class="col-sm-8">
                        <input id="CUST_ID" name="CUST_ID" class="form-control" maxlength="50" value="<?php echo $stuEmail; ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label for="TXN_AMOUNT" class="col-sm-4 col-form-label text-left">Amount</label>
                    <div class="col-sm-8">
                        <input id="TXN_AMOUNT" name="TXN_AMOUNT" class="form-control" type="text" value="<?php echo isset($_POST['id']) ? $_POST['id'] : ''; ?>" readonly>
                    </div>
                </div>
                <input type="hidden" name="INDUSTRY_TYPE_ID" value="Retail">
                <input type="hidden" name="CHANNEL_ID" value="WEB">

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-warning px-4">Checkout</button>
                    <a href="./Courses.php" class="btn btn-secondary px-4 ml-2">Cancel</a>
                </div> 
            </form>
            <small class="form-text mt-3">Note: Complete Payment by clicking the Checkout button</small>
        </div>
    </div>
</div>

<script src="js/Ajaxrequest.js"></script>
<script src="js/adminajaxrequest.js"></script>

</body>
</html>

<?php
}
?>
