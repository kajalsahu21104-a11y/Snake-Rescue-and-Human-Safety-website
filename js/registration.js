$(document).ready(function () {
  $("#registrationform").submit(function(event) {
    event.preventDefault();

    // Collect field values
    var fname = $("#name").val().trim();
    var email = $("#email").val().trim();
    var mobile = $("#mobile").val().trim();
    var gender = $("input[name='gender']:checked").val();
    var address = $("#address").val().trim();
    var password = $("#password").val().trim();

    // Validation flags
    var isValid = true;
    var errorMsg = document.getElementById("errorMsg");

    // Validate Name
    if (fname === "") {
      errorMsg += "Please enter your name.\n";
      isValid = false;
    }

    // Validate Email
    var emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
    if (email === "") {
      errorMsg += "Please enter your email.\n";
      isValid = false;
    } else if (!email.match(emailPattern)) {
      errorMsg += "Invalid email format.\n";
      isValid = false;
    }

    // Validate Mobile
    var mobilePattern = /^[0-9]{10}$/;
    if (mobile === "") {
      errorMsg += "Please enter your mobile number.\n";
      isValid = false;
    } else if (!mobile.match(mobilePattern)) {
      errorMsg += "Mobile number must be 10 digits.\n";
      isValid = false;
    }

    // Validate Gender
    if (gender === "") {
      errorMsg += "Please select your gender.\n";
      isValid = false;
    }

    // Validate Address
    if (address === "") {
      errorMsg += "Please enter your address.\n";
      isValid = false;
    }

    // Validate Password
    if (password === "") {
      errorMsg += "Please enter your password.\n";
      isValid = false;
    } else if (password.length < 4) {
      errorMsg += "Password must be at least 4 characters long.\n";
      isValid = false;
    }

    // Show error if any
    if (!isValid) {
      alert(errorMsg);
      return;
    }

    // All validation passed - Send AJAX
    $.ajax({
      type: "POST",
      url: "http://localhost/kajalphp/project/php/registration.php",
      data: {
        fname: fname,
        email: email,
        mobile: mobile,
        gender: gender,
        address: address,
        password: password
      },
      beforeSend:function () {
              $("#registerbtn").attr('disabled',true);
                $("#registerbtn").html('Loading ...');
      },
      success: function (data) {
        $("#registerbtn").removeAttr('disabled');
          $("#registerbtn").html('Register Now');
        console.log(data);
        alert("Registration successful!");
        var registrationform = document.getElementById("registrationform");
        registrationform.reset();


      },
      error: function (err) {

        alert("User Aleredy Ragister !Please Login");

      }
    });
  });
});
