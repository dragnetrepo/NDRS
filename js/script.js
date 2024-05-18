document.querySelector(".arrow-box").addEventListener("click", function (e) {
  document.querySelector(".arrow-box").classList.toggle("left-side");
  document.querySelector(".navbar-vertical").classList.toggle("d-none");
});

if (document.querySelector(".close-grid-3")) {
  document.querySelector(".close-grid-3").addEventListener('click', function (e) {
    e.preventDefault()

    document.querySelector('.discuss-3').classList.add("d-none")
  })
}

document.querySelector(".submit-dispute").addEventListener("click", function (e) {
  document.querySelector(".pop-overlay-dispute").classList.remove("d-none")

  setTimeout(() => {
    document.querySelector(".pop-overlay-dispute").classList.add("d-none")
  }, 3000)
})