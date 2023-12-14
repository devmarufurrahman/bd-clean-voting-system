// key press function
function onKeyPress() {
  document.body.addEventListener("keydown", (e) => {
    if (e.key == "N") {
      window.location =
        "https://bdclean.winkytech.com/backend/voting_web/controller/pages/head_of_it_winner.html";

      localStorage.clear();
    }
  });
}

onKeyPress();
