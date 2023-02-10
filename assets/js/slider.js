document.addEventListener("DOMContentLoaded", () => {
  const imgages = [
    "./assets/images/image-8.jpg",
    "./assets/images/image-19.jpg",
    "./assets/images/image-32.jpg",
    "./assets/images/image-20.jpg",
    "./assets/images/image-18.jpg",
    "./assets/images/image-10.jpg",
  ]
  let img = document.querySelector(".slider-img")

  let nextbtn = document.querySelectorAll(".next-back-btns")
  nextbtn.forEach((btn) => {
    console.log("click")
    btn.addEventListener("click", (e) => {
      changeSlides(imgages, img)
    })
  })

  setInterval(() => {
    changeSlides(imgages, img)
  }, 3000)
})

function changeSlides(pictures, element) {
  let index = Math.floor(Math.random() * 10)
  if (index > 0 && index <= pictures.length - 1) {
    element.src = pictures[index]
  } else {
    element.src = pictures[0]
  }
}
