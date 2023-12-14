function goResult() {
  window.location =
    "https://bdclean.winkytech.com/backend/voting_web/controller/pages/result_page.php";
}
localStorage.clear();

var timeLimitInMinutes = 15;
var timeLimitInSeconds = timeLimitInMinutes * 60;

function getTime() {
  localStorage.setItem("timeLimitInSeconds", timeLimitInSeconds);
}

setTimeout(function () {
  goResult();
  getTime();
}, 18000); // Delay of 22 seconds
