<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compitable" content="ie=edge">

    <title>DASHBOARD</title>
     
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="../Css/bootstrap.min.css">

    <!-- Font Awesome -->
    <!-- <link rel='stylesheet' href='../Css/all.min.css'> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     
     <!-- Google Font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@700&display=swap" rel="stylesheet">
    <!-- Custom Css -->
    <link rel='stylesheet' href='../Css/adminstyle.css'>

</head>
<body>

        <!-- Top Navbar -->

      <!-- adminheader starts -->
                <?php
               include('./admininclude/adminheader.php');

                ?>

                <!-- header ends -->
                <div class="col-sm-9 mt-5">
                    <div class="row mx-5 text-center">
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                                <div class="card-header">Courses</div>
                                <div class="card-body">
                                    <h4 class="card-title">5</h4>
                                    <a class="btn text-white" href="#">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                                <div class="card-header">Students</div>
                                <div class="card-body">
                                    <h4 class="card-title">25</h4>
                                    <a class="btn text-white" href="students.php">View</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 mt-5">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Sold</div>
                                <div class="card-body">
                                    <h4 class="card-title">3</h4>
                                    <a class="btn text-white" href="#">View</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="mx-5 mt-5 text-center">
                        <!-- Table -->
                         <p class="bg-dark text-white p-2">Course Ordered</p>
                         <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Course Id</th>
                                    <th scope="col">Student Email</th>
                                    <th scope="col">Order Date</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>    
                        </tbody>    
                        <tr>
                            <th scope="row">22</th>
                            <td>77</td>
                            <td>ashishishu2002@gmail.com</td>
                            <td>04/10/2024</td>
                            <td>1999</td>
                            <td><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="fas fa-trash-alt"></i></buuton></td>
                        </tr>
                    </tbody>
                </table>

                    </div>
                </div>
            </div>
         </div>

</div>
</div>


<!-- adminfooter starts -->

<?php
include('./admininclude/adminfooter.php');
?>

<!-- adminfooter ends -->