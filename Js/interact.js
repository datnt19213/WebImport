$(document).ready(() => {
  $(".toggle").click(() => {
    $(".menu-contact").slideToggle("fast");
  });
  document.querySelector("#fileinput").onchange = function () {
    document.querySelector("#filename").textContent = this.files[0].name;
  };
});
