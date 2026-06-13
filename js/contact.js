
function loadFeedbackTable() {
  fetch("../php/display_feedback.php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("feedbackTable").innerHTML = data;
    });
}

$(document).ready(function(){
  $("#feedbackForm").submit(function(event){
    event.preventDefault();
    const name = document.getElementById("name").value.trim();
    const comments = document.getElementById("comments").value.trim();
    const rating = document.querySelector('input[name="rating"]:checked')?.value;
    $.ajax({
      type:"POST",
      url:"http://localhost/kajalphp/project/php/feedbackfile.php",
      data:{
        name:name,
        comments:comments,
        rating:rating
      },
      success:function(res) {
        alert("successfully");
        window.location=location.href;
      }
    })
  });




getFeedback();
  function getFeedback() {
    $.ajax({
      type:"GET",
      url:"http://localhost/kajalphp/project/php/getfedbackDetails.php",

      success:function(res) {

        var data = JSON.parse(res);
        console.log(data);
      },
      error:function (err) {

      }
    })
  };
})

window.onload = loadFeedbackTable;
