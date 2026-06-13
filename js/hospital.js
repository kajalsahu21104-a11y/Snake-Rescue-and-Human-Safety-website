$(document).ready(function () {
  fetchHospitals();

  $("#hospitalForm").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "../php/save-hospital.php",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        fetchHospitals();
        $("#hospitalForm")[0].reset();
        $("#hospitalId").val('');
      }
    });
  });

  function fetchHospitals() {
    $.get("../php/fetch-hospital.php", function (data) {
      $("#hospitalTable tbody").html(data);
    });
  }

});




$(document).ready(function () {
  fetchHospitals();

  $("#doctorForm").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "../php/save-doctor.php",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        fetchHospitals();
        $("#hospitalForm")[0].reset();
        $("#hospitalId").val('');
      }
    });
  });

  function fetchHospitals() {
    $.get("../php/fetch-doctor.php", function (data) {
      $("#doctorTable tbody").html(data);
    });
  }
});



$(document).ready(function () {
  fetchHospitals();

  $("#rescueteamForm").submit(function (e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
      url: "../php/save-rescueteam.php",
      method: "POST",
      data: formData,
      contentType: false,
      processData: false,
      success: function () {
        fetchHospitals();
        $("#rescueteamForm")[0].reset();
        $("#rescueteamId").val('');
      }
    });
  });

  function fetchHospitals() {
    $.get("../php/fetch-rescueteam.php", function (data) {
      $("#rescueteamTable tbody").html(data);
    });
  }
});
