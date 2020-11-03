'use strict';

// Button to go on TOP of the Document //
window.onscroll = function () {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("scrollTopBtn").style.display = "block";
  } else {
    document.getElementById("scrollTopBtn").style.display = "none";
  }
};
// Scroll to the top of the document
function scrollTopBtn() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}