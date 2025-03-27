<?php
session_start();

// Ensure the session email and POST data are available
if(!isset($_SESSION['stuLogMail']) || !isset($_POST['ORDER_ID']) || !isset($_POST['CUST_ID']) || !isset($_POST['TXN_AMOUNT'])){
    echo "<script>location.href='LoginSignup.php'</script>";
    exit();
}

// Assign received POST data
$orderId = $_POST['ORDER_ID'];
$custId = $_POST['CUST_ID'];
$txnAmount = $_POST['TXN_AMOUNT'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Payment</title>
    <link rel="stylesheet" href="Css/bootstrap.min.css">
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f1f3f5;
            font-family: 'Ubuntu', sans-serif;
        }
        .qr-card {
            text-align: center;
            padding: 2rem;
            border-radius: 10px;
            background: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .qr-card img {
            width: 200px;
            height: 200px;
        }
        .btn-secondary {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="qr-card">
        <h3>Scan this QR Code to Pay</h3>
        <p>Order ID: <?php echo $orderId; ?></p>
        <p>Amount: ₹<?php echo $txnAmount; ?></p>
        
        <!-- QR Code Image -->
        <img src="Qr.jpg" alt="Paytm QR Code">
        
        <p class="mt-3">Please scan the QR code with your Payment app to complete the payment.</p>
        <a href="Courses.php" class="btn btn-secondary">Back to Courses</a>
    </div>
</div>

</body>
</html>
