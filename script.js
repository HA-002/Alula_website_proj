var numButtonClicks = 0;

function buttonClicked() {
  numButtonClicks = numButtonClicks + 1;
  document.getElementById("mainDiv").textContent =
    "Button Clicked times: " + numButtonClicks;
}

// === Fix tab layout rendering ===
function showTab(id) {
  var sections = document.querySelectorAll('.events-section');
  for (var i = 0; i < sections.length; i++) {
    sections[i].style.display = 'none';
  }

  var target = document.getElementById(id);
  target.style.display = 'block';

  // Re-apply grid layout
  setTimeout(function () {
    var grid = target.querySelector('.events-grid');
    if (grid) {
      grid.style.display = 'grid';
    }
  }, 0);
}
