<?php 
include('./dbConnection.php');
include('./Main/Header.php');
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- Courses Banner -->
<div class="container-fluid bg-dark">
    <div class="row">
        <img src="./images/courses.jpeg" alt="courses" style="height: 300px; width: 100%; object-fit: cover; box-shadow: 0px 4px 8px rgba(0,0,0,0.5);" />
    </div>
</div>

<div class="container my-5">
    <div class="row">
        <!-- Login Form -->
        <div class="col-md-4 p-4 shadow-sm bg-light rounded">
            <h5 class="mb-4">Already Registered? Log in</h5>
            <form role="form" id="stuLoginForm">
            <div class="form-group">
             <i class="fas fa-envelope"></i>
            <label for="stuLogMail" class="pl-2 font-weight-bold">Email</label>
            <small id="statusLogMsg1" class="text-danger"></small>
            <input type="email" class="form-control" placeholder="Email" name="stuLogMail" id="stuLogemail" aria-label="Email" required> 
            </div>
            <div class="form-group">
             <i class="fas fa-key"></i>
             <label for="stuLogPass" class="pl-2 font-weight-bold">Password</label>
             <input type="password" class="form-control" placeholder="Password" name="stuLogPass" id="stuLogpass" aria-label="Password" required> 
             </div>

                <button type="button" class="btn btn-primary btn-block" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
            </form>
            <small id="statusLogMsg" class="text-danger d-block mt-3"></small>
        </div>

        <!-- Registration Form -->
        <div class="col-md-7 offset-md-1 p-4 shadow-sm bg-light rounded">
            <h5 class="mb-4">New User? Register Here</h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <label for="stuname" class="pl-2 font-weight-bold">Name</label>
                    <small id="statusMsg1" class="text-danger"></small>
                    <input type="text" class="form-control" placeholder="Name" name="stuname" id="stuname" aria-label="Name">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i>
                    <label for="stuemail" class="pl-2 font-weight-bold">Email</label>
                    <small id="statusMsg2" class="text-danger"></small>
                    <input type="email" class="form-control" placeholder="Email" name="stuemail" id="stuemail" aria-label="Email">
                    <small class="form-text text-muted">We'll keep your email confidential.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i>
                    <label for="stupass" class="pl-2 font-weight-bold">New Password</label>
                    <small id="statusMsg3" class="text-danger"></small>
                    <input type="password" class="form-control" placeholder="Password" name="stupass" id="stupass" aria-label="Password">
                    <small class="form-text text-muted">Use a strong password to keep your account secure.</small>
                </div>
                <button type="button" class="btn btn-primary btn-block" id="signup" onclick="addStud()">Sign Up</button>
            </form>
            <small id="successMsg" class="text-success d-block mt-3"></small>
        </div>
    </div>
</div>
<hr />

<!-- Contact Us -->
<?php 
include('./Contact.php');
include('./Main/Footer.php');

?>
