document.addEventListener("DOMContentLoaded", () => {

  const imgages = [
    "./assets/images/image-1.jpg",
    "./assets/images/image-3.png",
    "./assets/images/image-4.jpg",
    "./assets/images/image-5.jpg",
    "./assets/images/image-6.jpg",
    "./assets/images/image-7.jpg",


  ]
  let img = document.querySelector('.slider-img');

  let nextbtn = document.querySelector(".fa-forward")
  nextbtn.addEventListener('click', (e) => {
    changeSlides(imgages,img)
  })


  
  setInterval(() => {
    changeSlides(imgages,img)
  }, 3000);
  
})


function changeSlides(pictures,element) {

  let index = Math.floor(Math.random() * 10)
  if (index > 0 && index <= pictures.length-1) {
    element.src=pictures[index]
  } else {
    element.src=pictures[0]
  }

  

}