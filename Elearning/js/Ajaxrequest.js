




// form validations
function addStud(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var name = $("#stuname").val();
    var mail = $("#stuemail").val();
    var pass = $("#stupass").val();

    // Form Validation on Submission
    if(name.trim()==""){
        $("#statusMsg1").html("<small style='color:red';> Name can't be Empty</small>");
        $("#name").onfocus();

        return false;
    }
    else if(mail.trim()==""){
        $("#statusMsg2").html("<small style='color:red';> This field cant be set Empty</small>");
        $("#mail").onfocus();

        return false;
    }
    else if(mail.trim() !="" && !reg.test(mail)){
        $("#statusMsg2").html("<small style='color:red';>Invalid email-Id (e.g example@gmail.com)</small>");
        $("#mail").onfocus();

        return false;
    }
    else if(pass.trim()==""){
        $("#statusMsg3").html("<small style='color:red';>This field cant be set Empty</small>");
        $("#pass").onfocus();

        return false;
    }

    else{
        // Ajax Calling
    $.ajax({
        url: 'Student/addStudent.php',
        method: 'POST',
        dataType: "json",
        data: {
            stusignup: "stusignup",
            stuname: name,   
            stumail: mail,   
            stupass: pass,   
        },
        success: function(data) {
            console.log(data); 
            if(data=="OK"){
                $("#successMsg").html("<span class='alert alert-success'>Registration Successful!</span>");
                clearStuReg();
            }
            else if(data=="FAILED"){
                $("#successMsg").html("<span class='alert alert-danger'>Registration Failed!</span>")
            }
        },
        error: function(err) {
            console.log(err);
        }
    });
      
    }


    
}


// Empty form fields 
function clearStuReg(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}




// Ajax call for student verification

function checkStuLogin(){
   var stuLogMail=$("#stuLogemail").val();
   var stuLogPass=$("#stuLogpass").val();
   $.ajax({
    url: 'Student/addStudent.php',
    method:"POST",
    data:{
        check:"check",
        stuLogMail:stuLogMail,
        stuLogPass:stuLogPass,
    },
    success:function(data){
        // console.log(data);
        if(data==0){
            $("#statusLogMsg").html('<small class="alert alert-danger">Invalid Email Id or Password!</small>');

        }
        else if(data==1){
            $("#statusLogMsg").html('<small class="alert alert-success">Login Success!</small>');
            setTimeout(()=>{
                window.location.href="index.php";
            },1000);
        }
      
    }
   });

}