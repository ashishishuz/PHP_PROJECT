
<!-- Student Registration -->


<!-- Modal -->
<div class="modal fade" id="stuRegModal" tabindex="-1" aria-labelledby="stuRegModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="stuRegModalLabel">STUDENT REGISTRATION</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form id="stuRegForm">
  <div class="form-group">
    <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name </label><small id="statusMsg1"></small><input type="text"
    class ="form-control" placeholder="Name" name="stuname" id="stuname" required>
  </div>
  <div class="form-group">
    <i class="fas fa-envelope"></i><label for="stuemail" class="pl-2 font-weight-bold">Email </label><small id="statusMsg2"></small><input type="email"
    class ="form-control" placeholder="Email" name="stuemail" id="stuemail" required>
    <small class="form-text">Don't Worry We'll Keep your email confidential</small>
  </div>
  <div class="form-group">
    <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">Password </label><small id="statusMsg3"></small><input type="password"
    class ="form-control" placeholder="Password" name="stupass" id="stupass" required>
  </div>
</form>
    
<!-- End Student Regitration Form -->
