document.querySelector(".arrow-box").addEventListener("click", function (e) {
  document.querySelector(".arrow-box").classList.toggle("left-side");
  document.querySelector(".navbar-vertical").classList.toggle("d-none");
});


document.querySelector(".close-grid-3").addEventListener('click', function (e) {
  e.preventDefault()

  document.querySelector('.discuss-3').classList.add("d-none")
})