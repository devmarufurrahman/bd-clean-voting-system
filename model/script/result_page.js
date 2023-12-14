var timerElement = document.getElementById("timer");
var total_voter = document.getElementById("total_voter");
var total_vote = document.getElementById("total_vote");
var rest_voter = document.getElementById("restOfVoter");
var voterTotal;
var voteTotal;
var restVote;
var timeLimitInSeconds;
timeLimitInSeconds = localStorage.getItem("timeLimitInSeconds");

function startTimer() {
  timeLimitInSeconds--;

  var minutes = Math.floor(timeLimitInSeconds / 60);
  var seconds = timeLimitInSeconds % 60;

  localStorage.setItem("timeLimitInSeconds", timeLimitInSeconds);

  if (timeLimitInSeconds < 0) {
    timerElement.textContent = "00:00";
    clearInterval(timerInterval);
    onKeyPress();
    clearInterval(apiInterval);
    return;
  }

  if (minutes < 10) {
    minutes = "0" + minutes;
    timerElement.style.color = "yellow";
  }

  if (minutes < 5) {
    timerElement.style.color = "#9A031E";
  }
  if (seconds < 10) {
    seconds = "0" + seconds;
  }

  timerElement.textContent = minutes + ":" + seconds;
}

var timerInterval = setInterval(startTimer, 1000);

// key press function
function onKeyPress() {
  document.body.addEventListener("keydown", (e) => {
    if (e.key == "N") {
      window.location =
        "https://bdclean.winkytech.com/backend/voting_web/controller/pages/logistic_winner.html";

      localStorage.clear();
    }
  });
}

// total voter cast
function getTotalVoter() {
  fetch(
    "https://bdclean.winkytech.com/backend/api/getTotalVoter.php?election_ref=1"
  )
    .then((res) => res.json())
    .then((data) => {
      voterTotal = data[0].total_voter;

      // voter total count
      if (voterTotal < 100) {
        voterTotal = "0" + voterTotal;
      }

      if (voterTotal < 10) {
        voterTotal = "0" + voterTotal;
      }
      if (voterTotal == 0) {
        voterTotal = "000";
      }

      total_voter.textContent = voterTotal;
    });
}

getTotalVoter();

// total vote cast
function getVoteCast() {
  fetch(
    "https://bdclean.winkytech.com/backend/api/getVoteCast.php?election_ref=1&election_position_ref=1"
  )
    .then((res) => res.json())
    .then((data) => {
      voteTotal = data[0].vote_cast;

      // vote total count
      if (voteTotal < 100) {
        voteTotal = "0" + voteTotal;
      }

      if (voteTotal < 10) {
        voteTotal = "0" + voteTotal;
      }

      if (voteTotal == 0) {
        voteTotal = "000";
      }

      total_vote.textContent = voteTotal;
      // voterTotal - voteTotal
      restVote = voterTotal - voteTotal;

      // rest voter count
      if (restVote < 100) {
        restVote = "0" + restVote;
      }

      if (restVote < 10) {
        restVote = "0" + restVote;
      }

      if (restVote == 0) {
        restVote = "000";
      }

      rest_voter.innerHTML = restVote;
    });
}

var apiInterval = setInterval(getVoteCast, 2000);

getVoteCast();
