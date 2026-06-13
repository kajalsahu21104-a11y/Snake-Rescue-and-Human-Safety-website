$(document).ready(function(){
$("#loginForm").submit(function(event) {
  event.preventDefault();
  var formdata = new FormData(this);

$.ajax({
  type:"POST",
  url:"login.php",
  data:formdata,
  processData:false,
  contentType:false,
  success:function (res) {
    if (res=="login success"){
      $("#notification").removeClass("d-none alert-danger");
      $("#notification").addClass("alert-success");
      $("#notification").html("<h2>Login success</h2>");
      window.location= "php/content.php";

    }else if (res=="wrong password"){
      $("#notification").removeClass("d-none alert-success");
      $("#notification").addClass("alert-danger");
      $("#notification").html("<h2>wrong password</h2>");
    }else {
      $("#notification").removeClass("d-none alert-success");
      $("#notification").addClass("alert-danger");
      $("#notification").html("<h2>User not found</h2>");
    }

  }
})
})

});
