$(document).ready(function () {
  $('.sidenav').sidenav();
});

$("marquee").hover(function () {
  this.stop();
}, function () {
  this.start();
});
