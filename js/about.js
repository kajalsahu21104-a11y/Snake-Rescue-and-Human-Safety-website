$(document).ready(function () {
  $("#aboutSearchBTN").click(function () {
    var prompt =   $("#aboutsearchInput").val();
    $.ajax({
      type: 'GET',
       url: 'http://localhost/kajalphp/project/php/searchanswer.php',
       data: {
         'query': prompt
               },
      success: function(response) {
                var design = `<h2 class="text-end"  <span > <button class="text-white btn btn-danger " style="width: 150px;" id="closeBTN"> <i class="fa fa-times-circle"></i> Close </button></span>  </h2>`;

                   $('#searchresult').html(design+ response); // Display the answer from the response
                   removeSearch();
               },
      error: function() {
                   $('#answerResult').html('Error occurred while fetching the answer.');
               }
           });



  })
})



function removeSearch() {
$("#closeBTN").click(function () {
  window.location = location.href;
})
}



// const questions = [
//   "सांपों को घर में घुसने से कैसे रोकें?",
//   "सांप रेस्क्यू कैसे किया जाता है?",
//   "सांप पकड़ने के लिए कौन सी हेल्पलाइन है?",
//   "सांप के बारे में कौन से मिथक हैं?",
//   "सांप के काटने पर प्राथमिक उपचार क्या है?",
//   "सांप के काटने पर क्या करना चाहिए?",
//   "सांप के काटने का इलाज कैसे करें?",
//   "सांप की प्रजातियाँ कौन सी हैं?",
//   "सांप की आपात स्थिति में किस नंबर पर कॉल करें?",
//   "सर्पदंश किट में क्या चीज़ें होनी चाहिए?",
//   "विषैले सांप कौन से होते हैं?",
//   "बैतूल में कौन-कौन से ज़हरीले सांप पाए जाते हैं?",
//   "बैतूल में कितनी प्रजातियों के सांप पाए जाते हैं?",
//   "घर में सांप आने से कैसे बचें?",
//   "क्या है विश्व सर्प दिवस?",
//   "क्या सांप की तस्वीर लेनी चाहिए?",
//   "क्या सभी सांप ज़हरीले होते हैं?",
//   "क्या झाड़-फूंक से सांप के ज़हर का इलाज होता है?",
//   "क्या ज़हर चूसकर निकाला जा सकता है?",
//   "कैसे पता चले कि सांप का काटा ज़हरीला है?",
//   "World Snake Day kab hota hai?",
//   "When is World Snake Day celebrated?",
//   "What to do after a snakebite?",
//   "What number should be dialed during a snake emergency?",
//   "Snake emergency mein kis number par call karein?"
// ];
//
// const input = document.getElementById("searchBox");
// const suggestionBox = document.getElementById("suggestions");
// const searchBtn = document.getElementById("searchBtn");
//
// input.addEventListener("input", () => {
//   const query = input.value.toLowerCase().trim();
//   suggestionBox.innerHTML = "";
//
//   if (query === "") return;
//
//   const filtered = questions.filter(q => q.toLowerCase().includes(query));
//   if (filtered.length === 0) {
//     suggestionBox.innerHTML = `
//       <li class="list-group-item text-muted">कोई परिणाम नहीं मिला</li>
//     `;
//     return;
//   }
//
//   filtered.forEach(item => {
//     const li = document.createElement("li");
//     li.classList.add("list-group-item");
//     li.textContent = item;
//     li.onclick = () => {
//       input.value = item;
//       suggestionBox.innerHTML = "";
//     };
//     suggestionBox.appendChild(li);
//   });
// });
//
// searchBtn.addEventListener("click", () => {
//   const query = input.value.trim();
//   if (query) {
//     alert("आपने खोजा: " + query);
//     suggestionBox.innerHTML = "";
//   } else {
//     alert("कृपया पहले सवाल टाइप करें।");
//   }
// });



const questions = [
  "सांपों को घर में घुसने से कैसे रोकें?",
  "सांप रेस्क्यू कैसे किया जाता है?",
  "सांप पकड़ने के लिए कौन सी हेल्पलाइन है?",
  "सांप के बारे में कौन से मिथक हैं?",
  "सांप के काटने पर प्राथमिक उपचार क्या है?",
  "सांप के काटने पर क्या करना चाहिए?",
  "सांप के काटने का इलाज कैसे करें?",
  "सांप की प्रजातियाँ कौन सी हैं?",
  "सांप की आपात स्थिति में किस नंबर पर कॉल करें?",
  "सर्पदंश किट में क्या चीज़ें होनी चाहिए?",
  "विषैले सांप कौन से होते हैं?",
  "बैतूल में कौन-कौन से ज़हरीले सांप पाए जाते हैं?",
  "बैतूल में कितनी प्रजातियों के सांप पाए जाते हैं?",
  "घर में सांप आने से कैसे बचें?",
  "क्या है विश्व सर्प दिवस?",
  "क्या सांप की तस्वीर लेनी चाहिए?",
  "क्या सभी सांप ज़हरीले होते हैं?",
  "क्या झाड़-फूंक से सांप के ज़हर का इलाज होता है?",
  "क्या ज़हर चूसकर निकाला जा सकता है?",
  "कैसे पता चले कि सांप का काटा ज़हरीला है?",
  "World Snake Day kab hota hai?",
  "When is World Snake Day celebrated?",
  "What to do after a snakebite?",
  "What number should be dialed during a snake emergency?",
  "Snake emergency mein kis number par call karein?"
];

const input = document.getElementById("searchBox");
const suggestionBox = document.getElementById("suggestions");
const searchBtn = document.getElementById("searchBtn");
const resultBox = document.getElementById("searchresult");

// Suggestions logic
input.addEventListener("input", () => {
  const query = input.value.toLowerCase().trim();
  suggestionBox.innerHTML = "";

  if (query === "") return;

  const filtered = questions.filter(q => q.toLowerCase().includes(query));
  if (filtered.length === 0) {
    const noResult = document.createElement("li");
    noResult.classList.add("list-group-item", "text-muted");
    noResult.textContent = "कोई परिणाम नहीं मिला";
    suggestionBox.appendChild(noResult);
    return;
  }

  filtered.forEach(item => {
    const li = document.createElement("li");
    li.classList.add("list-group-item");
    li.textContent = item;
    li.onclick = () => {
      input.value = item;
      suggestionBox.innerHTML = "";
    };
    suggestionBox.appendChild(li);
  });
});

// Search button click
searchBtn.addEventListener("click", () => {
  const query = input.value.trim();
  if (query === "") {
    alert("कृपया पहले सवाल टाइप करें।");
    return;
  }

  fetch(`http://localhost/kajalphp/project/php/searchanswer.php?query=${encodeURIComponent(query)}`)

      .then(res => {
      if (!res.ok) throw new Error("Network response was not ok");
      return res.text();
    })
    .then(response => {
      const design = `
        <div class="text-end mb-2">
          <button class="btn btn-danger text-white" id="closeBTN">
            <i class="fa fa-times-circle"></i> Close
          </button>
        </div>
      `;
      resultBox.innerHTML = design + response;

      // Close button
      document.getElementById("closeBTN").addEventListener("click", () => {
        resultBox.innerHTML = "";
      });

      suggestionBox.innerHTML = "";
    })
    .catch(error => {
      console.error("Fetch error:", error);
      resultBox.innerHTML = "<p class='text-danger'>उत्तर लाने में समस्या आई।</p>";
    });
});

// Language toggle function
function toggleLanguage(lang) {
  document.getElementById('lang-hi').style.display = (lang === 'hi') ? 'block' : 'none';
  document.getElementById('lang-en').style.display = (lang === 'en') ? 'block' : 'none';
}
