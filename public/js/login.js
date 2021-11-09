/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
console.clear();
var loginBtn = document.getElementById('login');
var signupBtn = document.getElementById('signup');
loginBtn.addEventListener('click', function (e) {
  var parent = e.target.parentNode.parentNode;
  Array.from(e.target.parentNode.parentNode.classList).find(function (element) {
    if (element !== "slide-up") {
      parent.classList.add('slide-up');
    } else {
      signupBtn.parentNode.classList.add('slide-up');
      parent.classList.remove('slide-up');
    }
  });
});
signupBtn.addEventListener('click', function (e) {
  var parent = e.target.parentNode;
  Array.from(e.target.parentNode.classList).find(function (element) {
    if (element !== "slide-up") {
      parent.classList.add('slide-up');
    } else {
      loginBtn.parentNode.parentNode.classList.add('slide-up');
      parent.classList.remove('slide-up');
    }
  });
});
/******/ })()
;