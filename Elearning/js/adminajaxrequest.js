
// //Ajax Call for admin Login verification

// function checkAdminLogin(){
//     console.log("ok") //debugging
//     var adminLogMail=$("#adminLogemail").val();
//     var adminLogPass=$("#adminLogpass").val();
//     $.ajax({
//      url: 'Admin/admin.php',
//      method:"POST",
//      data:{
//          check:"check",
//          adminLogMail:adminLogMail,
//          adminLogPass:adminLogPass,
//      },
//      success:function(data){
//          // console.log(data);
//          if(data==0){
//              $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email Id or Password!</small>');
 
//          }
//          else if(data==1){
//              $("#statusAdminLogMsg").html('<small class="alert alert-success">Login Success!</small>');
//              setTimeout(()=>{
//                  window.location.href="Admin/adminDashboard.php";
//              },1000);
//          }
       
//      }
//     });
 
// }

function checkAdminLogin() {
    // console.log("ok"); // Debugging
    var adminLogMail = $("#adminLogemail").val();
    var adminLogPass = $("#adminLogpass").val();

    $.ajax({
        url: 'Admin/admin.php',
        method: "POST",
        data: {
            check: "check",
            adminLogMail: adminLogMail,
            adminLogPass: adminLogPass,
        },
        success: function (data) {
            console.log("Response from server:", data); // Debugging response from server
            
            if (data == '0') {
                $("#statusAdminLogMsg").html('<small class="alert alert-danger">Invalid Email Id or Password!</small>');
            } else if (data == '1') {
                $("#statusAdminLogMsg").html('<small class="alert alert-success">Login Success!</small>');
                setTimeout(() => {
                    window.location.href = "Admin/adminDashboard.php";
                }, 1000);
            }
        },
        error: function (xhr, status, error) {
            console.error("AJAX error: " + error); // Handle any AJAX errors
        }
    });
}
