document.addEventListener("DOMContentLoaded", () => {

  const imgages = [
    "https://img.traveltriangle.com/blog/wp-content/uploads/2018/06/belgian-waffles-cover-image.jpg",
    "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSLVb0Kmr6jQsilL8LcGQIWtrXL8MyzR85GxuejHEF_pU6ylLbAhOvccZxN16UydS8uiGs&usqp=CAU",
    "https://www.willflyforfood.net/wp-content/uploads/2022/06/belgian-food-waffles2.jpg",
    "https://insanelygoodrecipes.com/wp-content/uploads/2021/07/Homemade-Belgian-Waffles-with-Ice-Cream-and-Strawberries-800x530.jpg"

  ]
  let img = document.querySelector('.slider-img');
  
  setInterval(() => {
    console.log('heshar')
    changeSlides(imgages,img)
  }, 3000);
  



})


function changeSlides(pictures,element) {

  let index = Math.floor(Math.random() * 10)
  
  if (index > 0 && index <= pictures.length-1) {
    element.src=pictures[index]
  }

  

}