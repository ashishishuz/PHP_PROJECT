

<!-- Student Registration -->

      <?php
      include('studentRegistration.php');
      ?>
      <div class="modal-footer">
        <span id="successMsg"></span>
      <button type="button" class="btn btn-primary" onClick="addStud()">Register</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End Student Regitration Form -->



<!-- Student Login Form -->
 <!-- Modal -->
<div class="modal fade" id="stuLoginModal" tabindex="-1" aria-labelledby="stuLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuLoginModalLabel">WELCOME BACK!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Student Login Form Start -->

      <form id="stuLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="stuLogemail" class="pl-2 font-weight-bold">Email</label><input type="email"
    class ="form-control" placeholder="Email" name="stuLogemail" id="stuLogemail" required>
  </div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="stuLogpass" class="pl-2 font-weight-bold">Password</label><input type="password"
    class ="form-control" placeholder="Password" name="stuLogpass" id="stuLogpass" required>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <small id="statusLogMsg"></small>
      <button type="button" class="btn btn-primary" id="stuLoginBtn" onClick="checkStuLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of Student Login Form -->




<!-- Admin Login Form -->
 <!-- Modal -->
 <div class="modal fade" id="AdminLoginModal" tabindex="-1" aria-labelledby="AdminLoginModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AdminLoginModalLabel"><i class="fa-solid fa-user-tie"></i>  Admin Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">







        <!-- Admin Login Form Start -->

      <form id="AdminLoginForm">
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="adminLogemail" class="pl-2 font-weight-bold">Email</label><input type="email"
    class ="form-control" placeholder="Email" name="adminLogemail" id="adminLogemail" required>
  </div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="adminLogpass" class="pl-2 font-weight-bold">Password</label><input type="password"
    class ="form-control" placeholder="Password" name="adminLogpass" id="adminLogpass" required>
  </div>
</form>
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" id="adminLoginBtn" onClick="checkAdminLogin()">Login</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>
<!-- End of Admin Login Form -->





<!-- Footer -->

<footer style="background-color: #343a40; color: #f1f1f1; padding: 0px;text-align: center; position: fixed; bottom: 0; width: 100%;">
    <p>&copy; <?php echo date("Y"); ?> MyPathshala Pvt Ltd. All rights reserved. Developed by <strong>Ashish</strong> ||
<a href="#login" style="color:red;"data-toggle="modal" data-target="#AdminLoginModal">Admin Login</a></p>
</footer>





















<!-- Jquery & Bootstrap Javascript -->
<script src='js/jq.min.js'></script>
<script src='js/popper.min.js'></script>
<script src='js/bootstrap.min.js'></script>

<!-- CDN -->
<!-- CDN -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

<!-- Font Awesome Js -->
<script src='js/all.min.js'></script>

<!-- Student Ajax -->
<script src='js/Ajaxrequest.js'></script>

<!-- Admin Ajax -->
 <script src='js/adminajaxrequest.js'></script>

    
</body>
</html>