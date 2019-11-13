$(document).ready(function () {
  $('.sidenav').sidenav();
  $('select').formSelect();
  $('.sidenav').sidenav();
});

$("marquee").hover(function () {
  this.stop();
}, function () {
  this.start();
});
