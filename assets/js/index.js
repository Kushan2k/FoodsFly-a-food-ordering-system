document.addEventListener('DOMContentLoaded', () => {
  
  document.addEventListener('scroll', (e) => {
    console.log(window.top)
    document.querySelector('.navbar-div').classList.add('bg-transparent')
  })
})