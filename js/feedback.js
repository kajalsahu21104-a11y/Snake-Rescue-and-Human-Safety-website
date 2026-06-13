document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("#feedbackForm");
  const responseMsg = document.querySelector("#responseMsg");

  if (!responseMsg) {
    // If the page doesn't include the message container, avoid crashing.
    return;
  }

  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const formData = new FormData(form);

fetch("../php/feedbackfile.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.text())
      .then(data => {
        responseMsg.textContent = data;
        form.reset();
      })
      .catch(error => {
        console.error("Error:", error);
        responseMsg.textContent = "Something went wrong. Please try again.";
        responseMsg.classList.add("text-danger");
      });
    });
  }
});
