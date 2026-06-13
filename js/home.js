$(document).ready(function () {
  $("#loginform").submit(function (event) {
    event.preventDefault();

    $.ajax({
      type: "POST",
      url: "http://localhost/kajalphp/project/php/login.php",
      data: {
        email: $("#email").val(),
        password: $("#password").val()
      },
      success: function (response) {
        if (response.trim() === "success") {
          alert("Login successful!");
          window.location.href = "../html/admin.html";
        } else {
          alert(response); // Wrong password or User not found
        }
      },
      error: function () {
        alert("Something went wrong!");
      }
    });
  });
});
